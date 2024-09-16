<?php

namespace App\Http\Controllers;

use App\Models\AboutApp;
use Illuminate\Http\Request;

class AboutAppController extends Controller
{
    /**
     * Display the profiles.
     */
    public function index()
    {
        // Mengambil semua entri AboutApp
        $aboutApp = AboutApp::first();

        return view('admin.about-app.index', compact('aboutApp'));
    }

    /**
     * Update the profile in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:255',
        ]);

        $aboutApp = AboutApp::find($id);

        if ($aboutApp) {
            $aboutApp->update($request->all());
            $message = 'About App updated successfully.';
        } else {
            AboutApp::create($request->all());
            $message = 'About App created successfully.';
        }

        return redirect()->route('about-app.index')
            ->with('success', $message);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:255',
        ]);

        AboutApp::create($request->all());

        return redirect()->route('about-app.index')
            ->with('success', 'About App created successfully.');
    }
}
