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

    //store message from strangers
    public function store(Request $request)
    {

        $validated = $request->validate([
            'to'      => 'bail|nullable|numeric',
            'name'    => 'bail|required|alpha_spaces',
            'email'   => 'bail|required|email',
            'contact' => 'bail|required|numeric',
            'content' => 'bail|required|alpha_num_spaces',
        ]);

        if (!isset($validated['to'])) {
            $validated['to'] = 0;
        }

        if (!isset($validated['from'])) {
            $validated['from'] = 0;
        }

        Message::create($validated);

        return back()->with('msg', 'message sent');
    }

    public function show(Message $message)
    {
        return view('auth.dashboard.admin.message.show', compact('message'));
    }

    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return back()->with('msg', 'Successfully Deleted Message');
    }

    public function archive(Message $message)
    {
        $message->read = true;
        $message->save();

        return back()->with('msg', 'Message Archived');
    }
}
