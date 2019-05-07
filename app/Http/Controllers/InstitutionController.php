<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Utils\Utils;
use App\Helpers\Helper;


class InstitutionController extends Controller
{

    protected $mod = 'institution';
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
   
    public function edit($institutionid)
    {
        $request = request();

    	$this->obj = \App\Institution::where('id', $institutionid)->with('usergroups')->with('products')->first();

        if($request->input('query')){ $this->q = $request->input('query'); }
        if($request->input('page')){ $this->p = $request->input('page'); }
        
        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }

    public function delete($institutionid)
    {
    	$this->obj = \App\Institution::where('id', $institutionid)->first();
    	$this->obj->delete();

        return redirect($this->mod .'/')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '"" has been deleted')->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function view($institutionid)
    {
 
        $request = request();

        if($request->input('query') !== null){ $this->q = $request->input('query'); }
        if($request->input('page')){ $this->p = $request->input('page'); }
        
    	$this->obj = \App\Institution::where('id', $institutionid)->with('groupList')->with('productList')->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function list()
    {
        
        $request = request();

        $name = $request->route()->getName();


        //accomodate jquery ui use of term instead of query
        if($request->term){
            $request->request->add(['query' => $request->term]);
            $request->request->remove('term');
        }

    	if($request->input('query') !== null){
    		$this->q = $request->input('query');
            if($name == 'api'){
              $this->list = \App\Institution::search($this->q)->orderBy('name')->get();
              $this->list->makeHidden(['votemultiplier', 'created_at', 'updated_at', 'countryphonecode', 'country', 'consortia']);
            }else{
    		  $this->list = \App\Institution::search($this->q)->orderBy('name')->get();
            }
    	}else{
    		$this->list = \App\Institution::orderBy('name')->get();
    	}


        if($name == 'api'){
           return $this->list->toJson();
        }else{

            if($request->input('page')){ $this->p = $request->input('page'); }
        
            $this->list = new LengthAwarePaginator($this->list->forPage($this->p, 15), $this->list->count(), 15, $this->p, ['path' => $this->mod]);
            if($this->q){ $this->list->appends('query', $this->q)->links(); }

    	   return view('/main')->with('list', $this->list)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);

        }   
    }
    
    public function submit()
    {

        $request = request();

    	$validator = $request->validate(['name' => 'required','votemultiplier' => 'required']);

        if($request->input('query')){ $this->q = $request->input('query'); }      
        if($request->input('page')){ $this->p = $request->input('page'); }
        
        $id = '';
        $selectedp = [];
        $selectedg = [];


       if(is_array($request->input('product')))
            $selectedp = $request->input('product');

        if(is_array($request->input('group')))
            $selectedg = $request->input('group');    
        

        $this->obj = \App\Institution::updateOrCreate(['id' => $request->input('id')], array_except($request->all(), ['_token']));

        $verb = 'add';
        if(!$this->obj->wasRecentlyCreated)
            $verb = 'edit';

        Helper::reconcileLinkedTable($this->obj->id, 'institutionid', $selectedp, '\App\InstitutionProduct', 'productcode');
        Helper::reconcileLinkedTable($this->obj->id, 'institutionid', $selectedg, '\App\InstitutionUserGroup', 'groupcode');

	   return redirect($this->mod . '/' . $this->obj->id . '/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '" has been ' . $verb . 'ed')->with('item', $this->obj)->with('query', $this->q)->with('page', $this->p)->with('verb', $verb)->with('mod', $this->mod);
    }


}
