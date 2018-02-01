<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'caption', 'location', 'price', 'beds', 'bath', 'sqft', 'sqftPrice', 'built', 'latitude', 'longitude'];

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

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    public function getPriceAttribute($value)
    {
        /*return the value of price with comma*/
        return number_format($value, 0, '.', ',');

    }
}
