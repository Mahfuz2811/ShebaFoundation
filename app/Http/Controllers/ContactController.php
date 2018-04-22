<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

// Models...
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $link = 8;
        $contact = Contact::first();
        return view('front.contact.index', compact('contact', 'link'));
    }
}
