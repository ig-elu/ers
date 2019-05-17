<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	use Searchable;

	public $asYouType = true;

    public function toSearchableArray(){
        //$array = $this->toArray();

        $array = ['id' => $this->id, 'key' => $this->id, 'title' => $this->title, 'description' => $this->description, 'keywords' => $this->keywords];

        return $array;
    }
    public function institution(){
        return $this->hasOne('App\Institution', 'id', 'institutionid');
    }
    public function product(){
        return $this->hasOne('App\Product', 'code', 'productcode');
    }
    public function module(){
        return $this->hasOne('App\Module', 'code', 'modulecode');
    }
    public function requeststatus(){
        return $this->hasOne('App\RequestStatuses', 'code', 'statuscode');
    }
    public function vendorstatus(){
        return $this->hasOne('App\RequestVendorStatuses', 'code', 'vendorstatuscode');
    }
    public function regionalcode(){
        return $this->hasOne('App\RequestRegionalCodes', 'code', 'reginalcode');
    }

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'statuscode', 'productcode', 'modulecode', 'description', 'vendorproblemno', 'vendorincidentno', 'vendorstatuscode', 'vendorcomplexitypoints', 'vendorcomplexitypointsexplanation', 'notes', 'privatenotes', 'requester', 'requesteremail', 'institutionid'];


}
