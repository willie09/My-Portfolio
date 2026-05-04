<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        try {
            Mail::to('wsardido2@gmail.com')->send(new ContactFormMail($validated));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send contact email: ' . $e->getMessage());
            return redirect()->back()->with('warning', 'Message saved, but email notification failed to send.');
        }

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.messages.index', [
            'messages' => ContactMessage::orderByDesc('created_at')->get(),
        ]);
    }

    /**
     * Mark message as read.
     */
    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['read_at' => now()]);

        return redirect()->back();
    }
}

