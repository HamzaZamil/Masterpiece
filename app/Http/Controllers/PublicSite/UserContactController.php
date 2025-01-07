<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class UserContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function index()
    {
        $contacts = ContactUs::all();
        return view('admin.contacts.index', compact('contacts'));
    }
}
