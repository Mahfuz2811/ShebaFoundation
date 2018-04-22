<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Models...
use App\Models\PeopleCategory;

class AdminPeopleCategoryController extends Controller
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
        $link = 3;
        $categories = PeopleCategory::all();
        return view('admin.people.category.index', compact('categories', 'link'));
    }

    public function create()
    {
        $link = 3;
        return view('admin.people.category.create', compact('link'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $category = new PeopleCategory;
        $category->title = $data['title'];
        $category->slug = $this->getSlug($data['title']);
        $category->created_by = 1;
        $category->updated_by = 1;
        $category->save();

        return redirect()
            ->route('admin_people_category_create')
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Category created successfully.')
            ->with('swt.type', 'success');
    }

    public function show($id)
    {
        $link = 3;
        $category = PeopleCategory::find($id);
        return view('admin.people.category.show', compact('category', 'link'));
    }

    public function edit($id)
    {
        $link = 3;
        $category = PeopleCategory::find($id);
        return view('admin.people:.category.edit', compact('category', 'link'));
    }

    public function update(Request $request, $id)
    {
       
        $data = $request->all();

        $category = PeopleCategory::find($id);
        $category->title = $data['title'];
        $category->slug = $this->getSlug($data['title']);
        $category->created_by = 1;
        $category->updated_by = 1;
        $category->update();

        return redirect()
            ->route('admin_people_category_edit', ['id' => $id])
            ->with('swt.title', 'Success!')
            ->with('swt.text', 'Category updated successfully.')
            ->with('swt.type', 'success');
    }

    public function destroy($id)
    {
        $link = 3;
        $category = PeopleCategory::find($id);
        if (count($category) > 0)
        {
            $category->delete();
            return redirect()
                ->route('admin_people_category_index')
                ->with('swt.title', 'Success!')
                ->with('swt.text', 'Category has been deleted successfully.')
                ->with('swt.type', 'success');
        }
        else
        {
            return redirect()
                ->route('admin_people_category_index')
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
