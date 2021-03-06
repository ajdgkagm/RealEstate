<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function hasRole($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name === $roleName)
            {
                return true;
            }
        }

        return false;
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function hasReservation($id)
    {
        foreach ($this->reservations()->get() as $reservation)
        {
            if ($reservation->property_id === $id)
            {
                return true;
            }
        }

        return false;
    }
}
