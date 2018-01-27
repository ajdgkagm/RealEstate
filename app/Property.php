<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'caption', 'location', 'price', 'beds', 'bath', 'sqft', 'sqftPrice', 'built'];
}
