<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\People;
use App\Models\PeopleCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// Models...
use App\Models\Post;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\News;
use App\Models\Gallery;

class FrontController extends Controller
{
    public function index()
    {
        $link = 1;
        $sliders = Slider::all();
        $about = Post::where('slug', 'about-sheba-foundation')->first();
        $blogs = Blog::orderBy('created_at', 'ASC')->take(4)->get();
        $newses = News::orderBy('created_at', 'ASC')->take(4)->get();
        $photos = Gallery::orderBy('created_at', 'ASC')->take(5)->get();
        return view('front.home.index', compact('about', 'newses', 'blogs', 'sliders', 'photos', 'link'));
    }

    public function homePost($slug)
    {
        if($slug == 'treatment-method')
        {
            $link = 2;
        }
        elseif ($slug == 'our-teams')
        {
            $link = 3;
        }
        elseif ($slug == 'about-us')
        {
            $link = 5;
        }
        elseif ($slug == 'effect-of-drugs')
        {
            $link = 8;
        }

        $post = Post::where('slug', $slug)->first();
        if ($post)
        {
            return view('front.post.index', compact('post', 'link'));
        }
        abort(404);
    }

    public function contactUs()
    {
        return "ok";
        $link = 7;
        $contact = Contact::first();
        return view('front.contact.index', compact('contact', 'link'));
    }

    public function keepTouch()
    {
        $link = 7;
        $contact = Contact::first();
        return view('front.contact.index', compact('contact', 'link'));
    }

    public function ourRecoveries($slug)
    {
        $link = 4;
        $post = Post::where('slug', $slug)->first();
        if ($post)
        {
            $category_data = PeopleCategory::where('slug', 'our-recoveries')->first();
            $peoples = People::where('people_category_id', 1)->get();
            return view('front.people.index', compact('peoples', 'link', 'category_data', 'post'));
        }
        abort(404);
    }

    public function ourTeams($slug)
    {

        $link = 3;

        $post = Post::where('slug', $slug)->first();
        if ($post)
        {
            $category_data = PeopleCategory::where('slug', 'our-teams')->first();
            $peoples = People::where('people_category_id', 2)->get();
            return view('front.people.index', compact('peoples', 'link', 'category_data', 'post'));
        }
        abort(404);
    }

    public function people($slug)
    {

    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
