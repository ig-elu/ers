<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionUserGroup extends Model
{
     public function usergroup()
    {
        return $this->hasOne('App\Group', 'code', 'groupcode');
    }
}
