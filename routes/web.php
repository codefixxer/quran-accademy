<?php

use App\Http\Controllers\AddStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MeetLinkController;
use App\Http\Controllers\teacher\StudentsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');







Route::get('/teacher', [TeacherController::class, 'index'])->name('admin.teacher.index');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('admin.teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('admin.teacher.store');
Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('admin.teacher.delete');

Route::put('/teacher/{id}/update', [TeacherController::class, 'update'])->name('admin.teacher.update');










Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
Route::get('/courses/index', [CourseController::class, 'index'])->name('admin.courses.index');
Route::post('/courses/store', [CourseController::class, 'store'])->name('course.store');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/courses/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');





// Student Routes
Route::get('/students/create', [StudentController::class, 'create'])->name('admin.student.create');
Route::get('/students/index', [StudentController::class, 'index'])->name('admin.student.index');
Route::post('/students/store', [StudentController::class, 'store'])->name('admin.student.store');
Route::get('/students/edit/{id?}', [StudentController::class, 'edit'])->name('admin.student.edit');
Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

Route::put('/admin/student/update/{id}', [StudentController::class, 'update'])->name('admin.student.update');





Route::get('/teacher/student/index', [StudentsController::class, 'index'])->name('teacher.student.index');




Route::get('/admin/books/list', [BookController::class, 'index'])->name('admin.books.index');
Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
Route::post('/admin/books/store', [BookController::class, 'store'])->name('admin.books.store');
Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');


Route::get('/teacher/zoom/zoomlinks', [StudentsController::class, 'zoomlink'])->name('teacher.zoom.zoomlinks');



Route::post('/save-meet-link', [MeetLinkController::class, 'store'])->name('meet.link.store');


Route::get('/meeting', [MeetingController::class, 'index'])->middleware('auth')->name('student.zoom.meeting');








// Show the history creation form
Route::get('teacher/history/{id}/create', [HistoryController::class, 'create'])->name('teacher.history.create'); 
Route::post('teacher/history/store', [HistoryController::class, 'store'])->name('teacher.history.store');

Route::get('teacher/history/{id}', [HistoryController::class, 'index'])->name('teacher.history.index');

Route::get('teacher/history/{id}/edit', [HistoryController::class, 'edit'])->name('teacher.history.edit');
Route::put('teacher/history/{id}', [HistoryController::class, 'update'])->name('teacher.history.update');

Route::delete('teacher/history/{id}', [HistoryController::class, 'destroy'])->name('teacher.history.destroy');

Route::get('teacher/history/{id}/form/{historyId?}', [HistoryController::class, 'form'])->name('teacher.history.form');
Route::prefix('admin/footer')->group(function () {
    Route::get('/', [FooterController::class, 'index'])->name('admin.footer.index');
    Route::get('/create', [FooterController::class, 'create'])->name('admin.footer.create');
    Route::post('/store', [FooterController::class, 'store'])->name('admin.footer.store');
    Route::get('/edit/{footer}', [FooterController::class, 'edit'])->name('admin.footer.edit');
    Route::put('/update/{footer}', [FooterController::class, 'update'])->name('admin.footer.update');
    Route::delete('/delete/{footer}', [FooterController::class, 'destroy'])->name('admin.footer.delete');
});










Route::prefix('admin/contactus')->group(function () {
  
    Route::get('/', [ContactController::class, 'index'])->name('admin.contactus.index');
    Route::get('/create', [ContactController::class, 'create'])->name('admin.contactus.create');
    Route::post('/store', [ContactController::class, 'store'])->name('admin.contactus.store');
    Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('admin.contactus.edit');
    Route::put('/update/{contact}', [ContactController::class, 'update'])->name('admin.contactus.update');
    Route::delete('/delete/{contact}', [ContactController::class, 'destroy'])->name('admin.contactus.destroy');
});





Route::get('student/books', [BookController::class, 'showbooks'])->name('student.books.index');
Route::get('student/books/index', [HistoryController::class, 'showhistory'])->name('student.history.index');
