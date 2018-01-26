<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('property.index');
    }

    public function profile()
    {
        return view('property.profile');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(property $property)
    {
        //
    }

    public function edit(property $property)
    {
        //
    }

    public function update(Request $request, property $property)
    {
        //
    }

    public function destroy(property $property)
    {
        //
    }
}
