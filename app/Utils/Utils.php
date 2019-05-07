<?php

namespace App\Utils;

use Illuminate\Http\Request;


class Utils{ 

    public function __construct() 
    {
    	//echo $request->path();
    	echo $_SERVER['HTTP_HOST'] . " " . $_SERVER['REQUEST_URI'];
        //View::share('site_settings', $this->site_settings);
    }


}