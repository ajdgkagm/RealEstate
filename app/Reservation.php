<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['property_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
