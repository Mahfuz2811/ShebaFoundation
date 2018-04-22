<?php

namespace App\Http\Controllers;

use App\Lib\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// Models...
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class AdminGalleryController extends Controller
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
    
    public function index($id)
    {
        $link = 7;
        $photos = Gallery::where('gallery_category_id', $id)->get();
        return view('admin.gallery.index', compact('link', 'photos', 'id'));
    }

    public function store(Request $request, $id)
    {
        if ( $request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'gallery';
            $path   = 'uploads/images/gallery';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);

            if($upload['status'] == true)
            {
                $gallery = new Gallery;
                $gallery->image = $upload['file_name'];
                $gallery->gallery_category_id = $id;
                $gallery->created_by = 1;
                $gallery->updated_by = 1;
                $gallery->save();

                return redirect()
                    ->route('admin_gallery_index', ['id' => $id])
                    ->with('swt.title', 'Success!')
                    ->with('swt.text', 'Photo Uploaded successfully.')
                    ->with('swt.type', 'success');
            }
        }
        else
        {
            return redirect()
                ->route('admin_gallery_index', ['id' => $id])
                ->with('swt.title', 'Error!')
                ->with('swt.text', 'Please Select A File First.')
                ->with('swt.type', 'warning');
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $file = $gallery->image;
        $path = 'uploads/images/gallery/';
        $file_remove = new FileUpload;
        $file_remove->remove($file, $path);
        $gallery->delete();
        return redirect()
            ->route('admin_gallery_index', ['id' => $gallery->gallery_category_id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Photo Has Been Deleted.')
            ->with('swt.type', 'success');
    }
}
