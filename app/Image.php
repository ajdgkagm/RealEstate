<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
