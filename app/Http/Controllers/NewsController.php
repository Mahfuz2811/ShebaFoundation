<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $link = 6;
        $newses = News::orderBy('created_at', 'ASC')->paginate(5);
        return view('front.news.index', compact('newses', 'link'));
    }

    public function news($slug)
    {
        $link = 6;
        $news = News::where('slug', $slug)->first();
        return view('front.news.post', compact('news', 'link'));
    }
}
