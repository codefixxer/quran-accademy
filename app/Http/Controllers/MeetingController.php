<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MeetLink;

class MeetingController extends Controller
{
    public function index()
    {
        // Sirf logged-in user ka meet link fetch karein
        $meetLink = MeetLink::where('user_id', Auth::id())->first();

        return view('student.zoom.meeting', compact('meetLink'));
    }
}
