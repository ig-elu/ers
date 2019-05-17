<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Utils\Utils;

class RequestController extends Controller
{
    protected $mod = 'request';
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
   
    public function edit($requestid)
    {
        $request = request();

    	$this->obj = \App\Request::where('id', $requestid)->first();

        if($request->input('query')){ $this->q = $request->input('query'); }
        if($request->input('page')){ $this->p = $request->input('page'); }
        
        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }

    public function delete($requestid)
    {
    	$this->obj = \App\Request::where('id', $requestid)->first();
    	$this->obj->delete();

        return redirect($this->mod .'/')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '"" has been deleted')->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function view($requestid)
    {
        $request = request();

        if($request->input('query') !== null){ $this->q = $request->input('query'); }
        if($request->input('page')){ $this->p = $request->input('page'); }

    	$this->obj = \App\Request::where('id', $requestid)->first();
        $this->obj_a = $this->obj;
        $this->obj_b = $this->obj;

        $name = $request->route()->getName();

        if($name == 'api'){
            return $this->obj->toJson(JSON_PRETTY_PRINT);
        }else{
            return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
        }

    }
   
    public function list()
    {
        $request = request();

    	if($request->input('query') !== null){
    		$this->q = $request->input('query');
    		$this->list = \App\Request::search($this->q)->orderBy('id', 'desc')->get();
    	}else{
    		$this->list = \App\Request::orderBy('id', 'desc')->with('product')->get();
    	}

        if($request->input('productcode')){ $this->list = $this->list->where('productcode', $request->input('productcode')); }
 
        if($request->input('statuscode')){ 
            $this->list = $this->list->where('statuscode', $request->input('statuscode')); 
        } elseif(! $request->input('archived') && $request->input('statuscode') != 10) { 
            $this->list = $this->list->where('statuscode', '!=' , 10); 
        }

        if($request->input('page')){ $this->p = $request->input('page'); }

        $this->list = new LengthAwarePaginator($this->list->forPage($this->p, 15), $this->list->count(), 15, $this->p, ['path' => 'request']);
        if($this->q){ $this->list->appends('query', $this->q)->links(); }
        if($request->input('statuscode')){ $this->list->appends('statuscode', $request->input('statuscode'))->links(); }
        if($request->input('productcode')){ $this->list->appends('productcode', $request->input('productcode'))->links(); }

        $this->list_a = \App\Product::all()->sortBy('name')->pluck('name', 'code');
        $this->list_b = \App\RequestStatuses::all()->sortBy('code')->keyBy('code')->pluck('name', 'code');

        return view('/main')->with('list', $this->list)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function submit()
    {

        $request = request();

    	$validator = $request->validate(['title' => 'required', 'productcode' => 'required', 'email' => 'email']);

        if($request->input('query')){ $this->q = $request->input('query'); }      
        if($request->input('page')){ $this->p = $request->input('page'); }
        if( !$request->input('statuscode') ){ $request->merge(['statuscode' => 'new']); }
        if( !$request->input('requester') ){ $request->merge(['requester' => auth()->user()->username]); }
        if( !$request->input('requesteremail') ){ $request->merge(['requesteremail' => auth()->user()->email]); }
        if( !$request->input('institutionid') ){ $request->merge(['institutionid' => auth()->user()->institutionid]); }

        if(!$request->input('language_specific')){
            $request->merge(['language_specific' => 0]);
        }else{
            $request->merge(['language_specific' => 1]);
        }
        //return response()->json($request);

        $this->obj = \App\Request::updateOrCreate(['id' => $request->input('id')], array_except($request->all(), ['_token']));

        $verb = 'add';
        if(!$this->obj->wasRecentlyCreated)
            $verb = 'edit';


        return redirect($this->mod . '/' . $this->obj->id . '/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->title . '" has been ' . $verb . 'ed')->with('item', $this->obj)->with('query', $this->q)->with('page', $this->p)->with('verb', $verb)->with('mod', $this->mod);

    }

    // ...
}
