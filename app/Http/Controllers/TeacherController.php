<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

  
    public function create()
    {
        return view('admin.teacher.create'); 
    }

    public function index()
    {
        // Fetch all teachers from the users table where role is 'teacher'
        $teachers = User::where('role', 'teacher')->get();

        // Return the view with the list of teachers
        return view('admin.teacher.index', compact('teachers'));
    }


    
public function edit($id)
{
    $teacher = User::findOrFail($id); // Fetch existing teacher for editing
    return view('admin.teacher.create', compact('teacher'));
}



public function update(Request $request, $id)
{
    $teacher = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $teacher->id,
        'password' => 'nullable|min:8', // Allow password to be optional
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password); // Hash the password
    }

    $teacher->update($data);

    return redirect()->route('admin.teacher.index')->with('success', 'Teacher updated successfully.');
}




    public function store(Request $request)
    {
        try {
            // Validate form data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
    
            // Insert into users table
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Encrypt password
                'role' => 'teacher', // Default role to 'teacher'
                'status' => 1,
            ]);
    
            return redirect()->route('admin.teacher.index')->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
{
    $teacher = User::findOrFail($id); // Find the teacher

    $teacher->delete(); // Delete the teacher record

    return redirect()->route('admin.teacher.index')->with('success', 'Teacher deleted successfully.');
}
























}
