<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of all footers.
     * Route: GET /admin/footer
     */
    public function index()
    {
        // Retrieve all footer records
        $footers = Footer::all();

        // Return the index view from resources/views/admin/footer/index.blade.php
        return view('admin.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new footer.
     * Route: GET /admin/footer/create
     */
    public function create()
    {
        // Return the create view from resources/views/admin/footer/create.blade.php
        return view('admin.footer.create');
    }

    /**
     * Store a newly created footer in storage.
     * Route: POST /admin/footer/store
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'whatsapp'        => 'nullable|string',
            'facebook'        => 'nullable|string',
            'instagram'       => 'nullable|string',
            'tiktok'          => 'nullable|string',
            'address'         => 'nullable|string',
            'phone'           => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
        ]);

        // Create the footer record
        Footer::create($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.footer.index')
                         ->with('success', 'Footer created successfully.');
    }

    /**
     * Show the form for editing the specified footer.
     * Route: GET /admin/footer/edit/{footer}
     */
    public function edit(Footer $footer)
    {
        // Return the edit view from resources/views/admin/footer/edit.blade.php
        // Pass the specific $footer to the view
        return view('admin.footer.create', compact('footer'));
    }

    /**
     * Update the specified footer in storage.
     * Route: POST /admin/footer/update/{footer}
     */
    public function update(Request $request, Footer $footer)
    {
        // Validate the incoming request
        $request->validate([
            'whatsapp'        => 'nullable|string',
            'facebook'        => 'nullable|string',
            'instagram'       => 'nullable|string',
            'tiktok'          => 'nullable|string',
            'address'         => 'nullable|string',
            'phone'           => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
        ]);

        // Update the footer record
        $footer->update($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.footer.index')
                         ->with('success', 'Footer updated successfully.');
    }

    /**
     * Remove the specified footer from storage.
     * Route: DELETE /admin/footer/delete/{footer}
     */
    public function destroy(Footer $footer)
    {
        // Delete the footer record
        $footer->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.footer.index')
                         ->with('success', 'Footer deleted successfully.');
    }
}
