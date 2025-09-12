<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('course')->get();
        return view('admin.books.index', compact('books'));
    }

    public function showbooks()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You are not logged in.');
    }

    // Check if the user has a student record
    $student = $user->student;

    if (!$student) {
        return back()->with('error', 'Student profile not found.');
    }

    // Check if the student is enrolled in a course
    if (!$student->course_id) {
        return back()->with('error', 'Student is not enrolled in a course.');
    }

    // Fetch books for the student's course
    $books = Book::where('course_id', $student->course_id)->get();

    return view('student.books.index', compact('books'));
}
    public function create()
    {
        $courses = Course::all();
        return view('admin.books.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'file' => 'required|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('books', $fileName, 'public');
        }

        Book::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'file_path' => $fileName ?? null,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    public function edit($book_id)
    {
        $book = Book::where('book_id', $book_id)->firstOrFail();
        $courses = Course::all();
        return view('admin.books.create', compact('book', 'courses'));
    }
    
    public function update(Request $request, $book_id)
    {
        $book = Book::where('book_id', $book_id)->firstOrFail();
    
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'file' => 'nullable|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            if ($book->file_path && Storage::disk('public')->exists("books/{$book->file_path}")) {
                Storage::disk('public')->delete("books/{$book->file_path}");
            }
    
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('books', $fileName, 'public');
    
            $book->file_path = $fileName;
        }
    
        $book->update([
            'course_id' => $request->course_id,
            'title' => $request->title,
        ]);
    
        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }
    

    public function destroy(Book $book)
    {
        if ($book->file && Storage::disk('public')->exists("books/{$book->file}")) {
            Storage::disk('public')->delete("books/{$book->file}");
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
