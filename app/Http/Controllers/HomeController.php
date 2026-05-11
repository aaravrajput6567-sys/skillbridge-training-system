<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:2000',
        ]);

        try {
            Mail::to('aaravrajput6567@gmail.com')
                ->send(new ContactMessage(
                    $request->name,
                    $request->email,
                    $request->message
                ));
        } catch (\Exception $e) {
            // Mail failed — still show success to the user, log the error
            \Log::error('Contact form mail failed: ' . $e->getMessage());
        }

        return redirect()->route('contact')
            ->with('success', 'Thank you, ' . $request->name . '! Your message has been received. We will get back to you soon.');
    }
}

