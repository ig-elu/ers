<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Utils\Utils;

class GroupController extends Controller
{
    protected $mod = 'group';
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
   
    public function edit($groupcode)
    {
    	$this->obj = \App\Group::where('code', $groupcode)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }

    public function delete($groupcode)
    {
    	$this->obj = \App\Group::where('code', $groupcode)->first();
    	$this->obj->delete();

        return redirect($this->mod .'/')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '"" has been deleted')->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function view($groupcode)
    {
    	$this->obj = \App\Group::where('code', $groupcode)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function list()
    {
    	$this->list = \App\Group::orderBy('sort')->get();

        return view('/main')->with('list', $this->list)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function submit()
    {

        $request = request();

    	$validator = $request->validate(['code' => 'required','name' => 'required']);

        if($request->input('query')){ $this->q = $request->input('query'); }      
        if($request->input('page')){ $this->p = $request->input('page'); }

        $this->obj = \App\Group::updateOrCreate(['code' => $request->input('code')], array_except($request->all(), ['_token']));

        $verb = 'add';
        if(!$this->obj->wasRecentlyCreated)
            $verb = 'edit';
		
        return redirect($this->mod . '/' . $this->obj->code . '/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '" has been ' . $verb . 'ed')->with('item', $this->obj)->with('query', $this->q)->with('page', $this->p)->with('verb', $verb)->with('mod', $this->mod);

    }
}
