<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Utils\Utils;
use App\Helpers\Helper;
use Webpatser\Countries\Countries;


class CountriesController extends Controller
{

    protected $mod = 'countries';
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
                $this->list = \App\Countries::search($this->q)->orderBy('name')->get();
            }
    	}
        if($name == 'api'){
           return $this->list->toJson();
        }  
    }
    
 


}
