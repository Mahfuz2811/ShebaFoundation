<?php

namespace App\Http\Controllers;

use App\Lib\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Models...
use App\Models\Gallery;
use App\Models\GalleryCategory;

class AdminCategoryController extends Controller
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
        $link = 7;
        $categories = GalleryCategory::all();
        return view('admin.gallery.category.index', compact('categories', 'link'));
    }

    public function create()
    {
        $link = 7;
        return view('gallery::category.create', compact('link'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $category = new GalleryCategory;
        $category->title = $data['title'];
        $category->slug = $this->getSlug($data['title']);
        $category->created_by = 1;
        $category->updated_by = 1;
        $category->save();

        return redirect()
            ->route('admin_gallery_category_create')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Category created successfully.')
            ->with('swt.type', 'success');
    }

    public function show($id)
    {
        $link = 7;
        $category = GalleryCategory::find($id);
        return view('admin.gallery.category.show', compact('category', 'link'));
    }

    public function edit($id)
    {
        $link = 7;
        $category = GalleryCategory::find($id);
        return view('gallery::category.edit', compact('category', 'link'));
    }

    public function update(Request $request, $id)
    {
       
        $data = $request->all();

        $category = GalleryCategory::find($id);
        $category->title = $data['title'];
        $category->slug = $this->getSlug($data['title']);
        $category->created_by = 1;
        $category->updated_by = 1;
        $category->update();

        return redirect()
            ->route('admin_gallery_category_edit', ['id' => $id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Category updated successfully.')
            ->with('swt.type', 'success');
    }

    public function destroy($id)
    {
        $link = 7;
        $category = GalleryCategory::find($id);
        if (count($category) > 0)
        {
            $category->delete();
            $photos = Gallery::select('image')->where('gallery_category_id', $category->id)->get();
            foreach ($photos as $photo)
            {
                $file = $photo;
                $path = 'uploads/images/gallery/';
                $file_remove = new FileUpload;
                $file_remove->remove($file, $path);
            }
            return redirect()
                ->route('admin_gallery_category_index')
                ->with('swt.title', 'Success!')
                ->with('swt.text', 'Category has been deleted successfully.')
                ->with('swt.type', 'success');
        }
        else
        {
            return redirect()
                ->route('admin_gallery_category_index')
                ->with('swt.title', 'Error!')
                ->with('swt.text', 'Category not found.')
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
