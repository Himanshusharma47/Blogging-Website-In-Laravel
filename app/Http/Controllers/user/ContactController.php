<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    /**
     * Handle the submission of contact form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        $mail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('himanshulpu1@gmail.com')->send(new ContactMail($mail));
        
        if($contact)
        {
            return redirect()->back()->with('success', 'Message Saved Successfully');
        }
        return redirect()->back()->with('error', 'Message Saved unsuccessfully');

    }
}
