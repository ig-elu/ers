<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['productcode', 'code', 'name', 'description'];
}
