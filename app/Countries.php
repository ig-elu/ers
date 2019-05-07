<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Countries extends Model
{
	use Searchable;

	  public $asYouType = true;

    public function toSearchableArray(){
        //$array = $this->toArray();

        return ['id' => $this->id,'name' => $this->name];

        //return $array;
    }


	protected $primaryKey = 'id';

}
