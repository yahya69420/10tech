<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerMessage;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        try {
            CustomerMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
            ]);

            return redirect()->back()->with('success', 'Message submitted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error submitting message: ' . $e->getMessage());
        }
    }
}