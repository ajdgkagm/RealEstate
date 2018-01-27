<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('store');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'to'      => 'bail|nullable|numeric',
            'name'    => 'bail|required|alpha_spaces',
            'email'   => 'bail|required|email',
            'contact' => 'bail|required|numeric',
            'message' => 'bail|required|alpha_num_spaces',
        ]);

        $validated['message'] = $validated['message'] . " \r\n \r\n Name: " . $validated['name']. " \r\n Email: " . $validated['email']. " \r\n Contact: " . $validated['contact'];

        if (!isset($validated['to'])) {
            $validated['to'] = 0;
        }

        Message::create(array_merge($validated, ['from' => 0]));

        return back()->with('msg', 'message sent');
    }

    public function show(Message $messages)
    {
        //
    }

    public function edit(Message $messages)
    {
        //
    }

    public function update(Request $request, Message $messages)
    {
        //
    }

    public function destroy(Message $messages)
    {
        //
    }
}
