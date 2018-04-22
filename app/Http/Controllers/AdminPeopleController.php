<?php

namespace App\Http\Controllers;

use App\Lib\FileUpload;
use App\Models\PeopleCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Models...
use App\Models\People;

class AdminPeopleController extends Controller
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
        $link = 4;
        $peoples = People::all();
        return view('admin.people.index', compact('peoples', 'link'));
    }

    public function create()
    {
        $link = 4;
        $categories = PeopleCategory::all();
        return view('admin.people.create', compact('link', 'categories'));
    }

    public function store(Request $request)
    {
        

        if ( $request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'people';
            $path   = 'uploads/images/people';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);

            if($upload['status'] == true)
            {
                $image = $upload['file_name'];
            }
        }
        else
        {
            $image = 'people.png';
        }

        $data = $request->all();

        $people = new People;
        $people->name = $data['name'];
        $people->image = $image;
        $people->people_category_id = $data['people_category_id'];
        $people->designation = $data['designation'];
        $people->grade = $data['grade'];
        $people->bio = $data['bio'];
        $people->people_category_id = $data['people_category_id'];
        $people->created_by = 1;
        $people->updated_by = 1;
        $people->save();

        return redirect()
            ->route('admin_people_create')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'People created successfully.')
            ->with('swt.type', 'success');
    }

    public function show($id)
    {
        $link = 4;
        $people = People::find($id);
        return view('admin.people.show', compact('people', 'link'));
    }

    public function edit($id)
    {
        $link = 4;
        $people = People::find($id);
        $categories = PeopleCategory::all();
        return view('admin.people.edit', compact('people', 'link', 'categories'));
    }

    public function update(Request $request, $id)
    {
        

        $people =  People::find($id);

        if ( $request->hasFile('image'))
        {
            $file = $people->image;
            $path = 'uploads/images/people/';

            $file_remove = new FileUpload;
            $remove = $file_remove->remove($file, $path);

            $file   = $request->file('image');
            $prefix = 'people';
            $path   = 'uploads/images/people';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);

            if($upload['status'] == true)
            {
                $image = $upload['file_name'];
            }
        }
        else
        {
            $image = $people->image;
        }

        $data = $request->all();

        $people = People::find($id);
        $people->name = $data['name'];
        $people->image = $image;
        $people->people_category_id = $data['people_category_id'];
        $people->designation = $data['designation'];
        $people->grade = $data['grade'];
        $people->bio = $data['bio'];
        $people->people_category_id = $data['people_category_id'];
        $people->created_by = 1;
        $people->updated_by = 1;
        $people->update();

        return redirect()
            ->route('admin_people_edit', ['id' => $id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'People updated successfully.')
            ->with('swt.type', 'success');
    }

    public function destroy($id)
    {
        $link = 4;
        $people = People::find($id);
        if (count($people) > 0)
        {
            $file = $people->image;
            $path = 'uploads/images/people/';
            $file_remove = new FileUpload;
            $file_remove->remove($file, $path);
            $people->delete();
            return redirect()
                ->route('admin_people_index')
                ->with('swt.title', 'Success!')
                ->with('swt.text', 'People has been deleted successfully.')
                ->with('swt.type', 'success');
        }
        else
        {
            return redirect()
                ->route('admin_people_index')
                ->with('swt.title', 'Error!')
                ->with('swt.text', 'People not found.')
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
