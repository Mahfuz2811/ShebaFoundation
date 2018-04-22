<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

// Models...
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index($slug = null)
    {
        $link = 7;
        $categories = BlogCategory::all();

        if ($slug == null)
        {
            $blogs = Blog::orderBy('created_at', 'ASC')->paginate(5);
        }
        else
        {
            $category = BlogCategory::where('slug', $slug)->first();
            $blogs = Blog::where('blog_category_id', $category->id)->orderBy('created_at', 'ASC')->paginate(5);
        }

        return view('front.blog.index', compact('categories', 'blogs', 'link'));
    }

    public function post($slug)
    {
        $link = 7;
        $categories = BlogCategory::all();
        $blog = Blog::where('slug', $slug)->first();
        return view('front.blog.post', compact('blog', 'categories', 'link'));
    }
}
