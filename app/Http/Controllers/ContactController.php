<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required'],

        ]);

        $contact = Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $users = User::permission('edit messages')->get();
        $superAdmins = User::role('super admin')->get();
        $notifiableUsers = $users->merge($superAdmins);
        Notification::send($notifiableUsers, new ContactCreated($contact));

        return Redirect::route('contact.create')->with('contact-message', 'Your message was successfully sent!');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function show(Request $request)
    {
        $contact = Contact::findOrFail($request->id);

        return view('contact.show', [
            'contact' => $contact,
        ]);
    }
}
