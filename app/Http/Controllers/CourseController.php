<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Show Course List
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Show Create Course Form
    public function create()
    {
        return view('admin.courses.create', ['course' => null]);
    }

    // Show Edit Course Form
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.create', compact('course')); // Using the same form for edit
    }

    // Store New Course
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'schedule' => 'required|integer|min:1|max:7',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('courses', 'public') : null;

        Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'schedule' => $request->schedule,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    // Update Existing Course
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'schedule' => 'required|integer|min:1|max:7',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            Storage::delete('public/' . $course->image);
            $imagePath = $request->file('image')->store('courses', 'public');
        } else {
            $imagePath = $course->image;
        }

        $course->update([
            'name' => $request->name,
            'price' => $request->price,
            'schedule' => $request->schedule,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    // Delete Course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully!');
    }
}
