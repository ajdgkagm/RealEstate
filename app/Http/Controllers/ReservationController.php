<?php

namespace App\Http\Controllers;

use App\Property;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    //@todo prevent double reservation for same property
    public function store(Property $property)
    {
        Reservation::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id
        ]);

        return back()->with('msg', 'Reserved Success');
    }

    public function destroy(Property $property)
    {
        $reservation = Reservation::where('user_id', auth()->id())
        ->where('property_id', $property->id)->first();

        $reservation->delete();

        return back()->with('msg', 'Reservation Deleted');
    }
}
