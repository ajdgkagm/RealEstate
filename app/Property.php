<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'caption', 'location', 'price', 'beds', 'bath', 'sqft', 'sqftPrice', 'built'];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function firstImage()
    {
        return $this->images()->first();
    }

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
}
