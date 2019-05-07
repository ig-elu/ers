<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
	use Searchable;

	  public $asYouType = true;

    public function toSearchableArray(){
        //$array = $this->toArray();

        return ['id' => $this->id,'name' => $this->name];

        //return $array;
    }

    public function usergroups(){
       return $this->hasMany('App\InstitutionUserGroup', 'institutionid', 'id');
    }

    public function products(){
       return $this->hasMany('App\InstitutionProduct', 'institutionid', 'id');
    }

    public function productList(){
       return $this->hasManyThrough('App\Product', 'App\InstitutionProduct', 'institutionid', 'code', 'id', 'productcode');
    }
    public function groupList(){
       return $this->hasManyThrough('App\Group', 'App\InstitutionUserGroup', 'institutionid', 'code', 'id', 'groupcode');
    }
    public function countryname(){
       return $this->hasOne('Webpatser\Countries\Countries', 'id', 'country');
    }

	  protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'votemultiplier', 'country', 'countryphonecode', 'consortia'];

}
