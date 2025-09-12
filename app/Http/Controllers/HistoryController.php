<?php


namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function create($id)
{
    return view('teacher.history.create', compact('id')); // Passing the ID to the view
}

public function showHistory()
{
    $user = Auth::user();

    if (!$user) {
        return back()->with('error', 'User record not found.');
    }

    $histories = History::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

    return view('student.history.index', compact('histories'));
}



public function form($id, $historyId = null)
{
    $history = $historyId ? History::findOrFail($historyId) : null;
    return view('teacher.history.form', compact('id', 'history'));
}

public function index($id)
{
    // Fetch all history records for the user
    $histories = History::where('user_id', $id)->get();

    // Get today's history record, if any
    $todayHistory = History::where('user_id', $id)
        ->whereDate('created_at', now()->toDateString())
        ->first();

    return view('teacher.history.index', compact('histories', 'todayHistory', 'id'));
}


public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'description' => 'required|string',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
    ]);

    $filePath = null;
    
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('history_files', 'public');
    }

    $history = History::create([
        'user_id' => $request->user_id,
        'description' => $request->description,
        'file' => $filePath,
    ]);

    // Fix: Pass `user_id` to index route
    return redirect()->route('teacher.history.index', ['id' => $history->user_id])
                     ->with('success', 'History record added successfully!');
}








    public function edit($id)
    {
        $history = History::findOrFail($id); // Fetch the history record
        return view('teacher.history.create', compact('history','id')); // Pass history to the view
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);
    
        $history = History::findOrFail($id);
        
        $history->description = $request->description;
    
        if ($request->hasFile('file')) {
            if ($history->file) {
                Storage::disk('public')->delete($history->file);
            }
            
            $filePath = $request->file('file')->store('history_files', 'public');
            $history->file = $filePath;
        }
    
        $history->save();
    
        // Fix: Pass `user_id` to index route
        return redirect()->route('teacher.history.index', ['id' => $history->user_id])
                         ->with('success', 'History record updated successfully!');
    }
    
    


    public function destroy($id)
{
    $history = History::findOrFail($id);

    // Delete the file if it exists
    if ($history->file) {
        Storage::disk('public')->delete($history->file);
    }

    $history->delete();

    return redirect()->back()->with('success', 'History record deleted successfully!');
}

}
