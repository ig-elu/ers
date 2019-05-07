<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'name', 'special', 'description', 'emailnotifications'];
}
