<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetLink;

class MeetLinkController extends Controller
{ 
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'link' => 'required',
        ]);

        // Update if exists, otherwise create new record
        MeetLink::updateOrCreate(
            ['user_id' => $request->user_id], // Condition: Check by user_id
            ['link' => $request->link] // Update or insert this link
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Meet link saved successfully!');
    }
}
