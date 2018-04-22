<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $link = 10;
        $contact = Contact::first();
        return view('admin.setting.contact.index', compact('contact', 'link'));
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        $contact = Contact::first();
        $contact->address_line_1 = $data['address_line_1'];
        $contact->address_line_2 = $data['address_line_2'];
        $contact->phone = $data['phone'];
        $contact->email = $data['email'];
        $contact->website = $data['website'];
        $contact->facebook = $data['facebook'];
        $contact->twitter = $data['twitter'];
        $contact->google_plus = $data['google_plus'];
        $contact->gmap_address = $data['gmap_address'];
        $contact->update();
        return redirect()
            ->route('admin_contact_index')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Contact information updated successfully.')
            ->with('swt.type', 'success');
    }
}
