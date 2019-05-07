<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionProduct extends Model
{
    public function product()
    {
        return $this->hasOne('App\Product', 'code', 'productcode');
    }
}
