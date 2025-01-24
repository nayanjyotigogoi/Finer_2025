<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobileNumber' => 'required|digits:10',
            'message' => 'required|string',
        ]);

        Mail::to('admin@example.com')->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
