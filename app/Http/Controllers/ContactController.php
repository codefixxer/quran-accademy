<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new contact.
     * Route: GET /admin/contactus/create
     */
    public function create()
    {
        return view('admin.contactus.form');  // The same form view for create
    }

    /**
     * Store a newly created contact in storage.
     * Route: POST /admin/contactus/store
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contactus.create')->with('success', 'Your message has been sent successfully.');
    }

    /**
     * Show the form for editing an existing contact.
     * Route: GET /admin/contactus/edit/{contact}
     */
    public function edit(Contact $contact)
    {
        return view('admin.contactus.form', compact('contact')); // Same view with contact variable set
    }

    /**
     * Update the specified contact in storage.
     * Route: PUT /admin/contactus/update/{contact}
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contactus.edit', $contact->id)->with('success', 'Contact updated successfully.');
    }

    public function index()
{
    $contacts = Contact::all();
    return view('admin.contactus.index', compact('contacts'));
}


public function destroy(Contact $contact)
{
    $contact->delete();
    return redirect()->route('admin.contactus.index')
                     ->with('success', 'Contact deleted successfully.');
}
}
