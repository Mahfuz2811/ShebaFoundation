<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

Use App\Models\News;

class AdminNewsController extends Controller
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
        $link = 8;
        $newses = News::all();
        return view('admin.news.index', compact('newses', 'link'));
    }

    public function create()
    {
        $link = 8;
        return view('admin.news.create', compact('link'));
    }

    public function store(Request $request)
    {
        // $request->validate($request,[
        //     'title' => 'required',
        // ]);

        $data = $request->all();

        $news = new News;
        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->slug = "https://www.facebook.com/plugins/post.php?href=".$data['title'];
        $news->created_by = 1;
        $news->updated_by = 1;
        $news->save();

        return redirect()
            ->route('admin_news_create')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'News created successfully.')
            ->with('swt.type', 'success');
    }

    public function show($id)
    {
        $link = 8;
        $news = News::find($id);
        return view('admin.news.show', compact('news', 'link'));
    }

    public function edit($id)
    {
        $link = 8;
        $news = News::find($id);
        return view('admin.news.edit', compact('news', 'link'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate($request, [
        //     'title' => 'required',
        // ]);

        $data = $request->all();

        $news = News::find($id);
        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->slug = "https://www.facebook.com/plugins/post.php?href=".$data['title'];
        $news->created_by = 1;
        $news->updated_by = 1;
        $news->save();

        return redirect()
            ->route('admin_news_edit', ['id' => $id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'News created successfully.')
            ->with('swt.type', 'success');
    }

    public function destroy($id)
    {
        $link = 8;
        $news = News::find($id);
        if (count($news) > 0)
        {
            $news->delete();
            return redirect()
                ->route('admin_news_index')
                ->with('swt.title', 'Success!')
                ->with('swt.text', 'News has been deleted successfully.')
                ->with('swt.type', 'success');
        }
        else
        {
            return redirect()
                ->route('admin_news_index')
                ->with('swt.title', 'Error!')
                ->with('swt.text', 'News not found.')
                ->with('swt.type', 'warning');
        }
    }

    public function getSlug($string)
    {
        $string = strtolower($string);
        $output = str_replace(' ', '-', $string);
        return $output;
    }
}
