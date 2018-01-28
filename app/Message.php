<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from', 'to', 'content', 'name', 'email', 'contact',];

    public function user()
    {
        return $this->belongsTo('App\User', 'to');
    }
}
