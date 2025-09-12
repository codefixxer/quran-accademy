<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{

    public function zoomLinks()
    {
        return view('teacher.zoom.zoomlinks'); // Ensure this matches your file structure
    }

    public function index()
    {
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('users.role', 'student')
            ->where('students.teacher_id', Auth::id())
            ->select('users.id', 'users.name', 'users.email')
            ->get();
    
        return view('teacher.students.index', compact('students'));
    }


    public function zoomLink()
    {
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('users.role', 'student')
            ->where('students.teacher_id', Auth::id())
            ->select('users.id', 'users.name', 'users.email')
            ->get();
    
        return view('teacher.zoom.zoomlinks', compact('students'));
    }
    
    















}
