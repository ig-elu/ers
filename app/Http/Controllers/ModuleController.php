<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use App\User;

class ModuleController extends Controller
{
    protected $mod = 'module';
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

    public function add($productcode)
    {
        $this->obj_a = \App\Product::where('code', $productcode)->first();
        
        return view('/main')->with('productcode', $productcode)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function edit($productcode, $modulecode)
    {
    	$this->obj = \App\Module::where('productcode', $productcode)->where('code', $modulecode)->first();
        $this->obj_a = \App\Product::where('code', $productcode)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }

    public function delete($productcode, $modulecode)
    {
    	$this->obj = \App\Module::where('productcode', $productcode)->where('code', $modulecode)->first();
    	$obj->delete();

        return redirect('product/' . $productcode . '/' . $this->mod .'/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '"" has been deleted')->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function view($productcode, $modulecode)
    {
    	$this->obj = \App\Module::where('productcode', $productcode)->where('code', $modulecode)->first();
        $this->obj_a = \App\Product::where('code', $productcode)->first();

        return view('/main')->with('item', $this->obj)->with('obj_a', $this->obj_a)->with('obj_b', $this->obj_b)->with('list_a', $this->list_a)->with('list_b', $this->list_b)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
   
    public function list()
    {
    	$list = \App\Module::all()->sortBy("name");

        return view('/main')->with('list', $this->list)->with('query', $this->q)->with('page', $this->p)->with('verb', __FUNCTION__)->with('mod', $this->mod);
    }
    
    public function submit()
    {

        $request = request();

        $validator = $request->validate(['productcode' => 'required', 'code' => 'required', 'name' => 'required']);

        if($request->input('query')){ $this->q = $request->input('query'); }      
        if($request->input('page')){ $this->p = $request->input('page'); }

        $this->obj = \App\Module::updateOrCreate(['code' => $request->input('code')], array_except($request->all(), ['_token']));

        $verb = 'add';
        if(!$this->obj->wasRecentlyCreated)
            $verb = 'edit';

        return redirect('product/'. $this->obj->productcode . '/' . $this->mod . '/' . $this->obj->code . '/view')->with('success', ucfirst($this->mod) . ' "' . $this->obj->name . '" has been ' . $verb . 'ed')->with('item', $this->obj)->with('query', $this->q)->with('page', $this->p)->with('verb', $verb)->with('mod', $this->mod);

    }
}
