<?php

namespace App\Http\Controllers;

use App\Lib\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Model...
use App\Models\Slider;

class AdminSliderController extends Controller
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
        $link = 9;
        $photos = Slider::all();
        return view('admin.setting.slider.index', compact('link', 'photos'));
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        if ( $request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'slider';
            $path   = 'uploads/images/slider';
            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);

            if($upload['status'] == true)
            {
                $slider = new Slider;
                $slider->title = $data['title'];
                $slider->image = $upload['file_name'];
                $slider->created_by = 1;
                $slider->updated_by = 1;
                $slider->save();
                return redirect()
                    ->route('admin_slider_index')
                    ->with('swt.title', 'Success!')
                    ->with('swt.text', 'Photo Uploaded successfully.')
                    ->with('swt.type', 'success');
            }
        }
        else
        {
            return redirect()
                ->route('admin_slider_index')
                ->with('swt.title', 'Error!')
                ->with('swt.text', 'Please Select A File First.')
                ->with('swt.type', 'warning');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $file = $slider->image;
        $path = 'uploads/images/slider/';
        $file_remove = new FileUpload;
        $file_remove->remove($file, $path);
        $slider->delete();
        return redirect()
            ->route('admin_slider_index')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Photo Has Been Deleted.')
            ->with('swt.type', 'success');
    }
}
