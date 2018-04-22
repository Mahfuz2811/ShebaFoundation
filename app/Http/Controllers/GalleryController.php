<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

// Models...
use App\Models\Gallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index($slug = null)
    {
        $link = 6;
        $categories = GalleryCategory::all();

        if ($slug == null)
        {
            $photos = Gallery::orderBy('created_at', 'ASC')->paginate(6);
        }
        else
        {
            $category_data = GalleryCategory::where('slug', $slug)->first();
            $photos = Gallery::where('gallery_category_id', $category_data->id)->orderBy('created_at', 'ASC')->paginate(6);
        }

        return view('front.gallery.index', compact('categories', 'photos', 'category_data', 'link'));
    }
}
