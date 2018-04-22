<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
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
        $link = 1;
        return view('admin.index', compact('link'));
    }

    public function create()
    {
        return view('dashboard::create');
    }

    public function store(Request $request)
    {
    }

    public function show()
    {
        return view('dashboard::show');
    }

    public function edit()
    {
        return view('dashboard::edit');
    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
