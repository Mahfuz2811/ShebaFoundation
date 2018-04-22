<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index($slug)
    {
        if ($slug == 'academics')
        {
            $link = 3;
        }
        else
        {
            $link = 2;
        }

        $post = Post::where('slug', $slug)->first();
        if (count($post))
        {
            return view('front.post.index', compact('post', 'link'));
        }
        abort(404);
    }
}
