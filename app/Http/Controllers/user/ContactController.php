<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        $contact->save();

        if($contact)
        {
            return redirect()->back()->with('success', 'Message Saved Successfully');
        }
        return redirect()->back()->with('error', 'Message Saved unsuccessfully');   

    }
}
