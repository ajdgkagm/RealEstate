<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function properties()
    {
        return $this->belongsToMany('App\Property');
    }
}
