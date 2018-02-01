<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_Type extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'property_type';
}
