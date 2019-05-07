<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    protected $mod = 'user';
    protected $p = 1;
    protected $q = '';
    protected $obj = '';
    protected $obj_a = '';
    protected $obj_b = '';
    protected $list = '';
    protected $list_a = '';
    protected $list_b = '';
    protected $del_a = '';
    protected $del_b = '';

    public function add()
    {
        return view('/main')->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function edit($username)
    {
    	$this->obj = \App\User::where('username', $username)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }

    public function delete($username)
    {
    	$this->obj = \App\User::where('username', $username)->first();
    	$this->obj->delete();

        return redirect($this->mod .'/')->with('success', ucfirst($this->mod) . ' "' . $this->obj->username . '"" has been deleted')->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function view($username)
    {
    	$this->obj = \App\User::where('username', $username)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function list()
    {
        $request = request();

        if($request->input('query') !== null){
            $this->q = $request->input('query');
            $this->list = \App\User::search($this->q)->orderBy('id')->get();
        }else{
            $this->list = \App\User::orderBy('id')->get();
        }

        if($request->input('page')){ $this->p = $request->input('page'); }
        
        $this->list = new LengthAwarePaginator($this->list->forPage($this->p, 15), $this->list->count(), 15, $this->p, ['path' => $this->mod]);
        if($this->q){ $this->list->appends('query', $this->q)->links(); }

        return view('/main')->with('list', $this->list)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function submit()
    {
 
        $request = request();

        $validator = $request->validate(['username' => 'required','name' => 'required']);

    	$verb = 'add';

    	if(\App\User::where('username', $request->username)->count()){
            $this->obj = \App\User::updateOrCreate(['username' => $request->input('username')], array_except($request->all(), ['_token','password']));
    		$verb = 'edit';
    	}else{
            $request->merge(['password' => Hash::make($request->password)]);
            $this->obj = \App\User::updateOrCreate(['id' => $request->input('id')], array_except($request->all(), ['_token']));
    	}
		
        return redirect($this->mod . '/' . $this->obj->username . '/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->username . '" has been ' . $verb . 'ed')->with('item', $this->obj)->with('query', $this->q)->with('page', $this->p)->with('verb', $verb)->with('mod', $this->mod);
    }
}
