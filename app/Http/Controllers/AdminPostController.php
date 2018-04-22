<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Models...
use App\Models\Post;

class AdminPostController extends Controller
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
        $link = 2;
        $posts = Post::all();
        return view('admin.post.index', compact('link', 'posts'));
    }

    public function show($id)
    {
        $link = 2;
        $post = Post::find($id);
        return view('admin.post.show', compact('link', 'post'));
    }

    public function edit($id)
    {
        $link = 2;
        $post = Post::find($id);
        return view('admin.post.edit', compact('link', 'post'));
    }

    public function update(Request $request, $id)
    {
        $link = 2;
        $data = $request->all();
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->updated_by = 1;
        $post->update();
        return redirect()
            ->route('admin_post_edit', ['id' => $id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Post has been updated successfully.')
            ->with('swt.type', 'success');
    }
}
