<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

// Models...
use App\Models\People;
use App\Models\PeopleCategory;

class PeopleController extends Controller
{
    public function index($slug)
    {
        $link = 4;
        $categories = PeopleCategory::all();
        $category_data = PeopleCategory::where('slug', $slug)->first();
        $peoples = People::where('people_category_id', $category_data->id)->get();
        return view('front.people.index', compact('categories', 'category_data', 'peoples', 'link'));
    }
}
