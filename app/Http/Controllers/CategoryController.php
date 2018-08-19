<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $paginate_number = 5;

    public function index()
    {
        //
        $paginate_number = $this->paginate_number;
        $categories = Category::paginate($paginate_number);
        // return $categories;
        return view('category.category', compact('categories','paginate_number'));
    }

    public function search(Request $request)
    {
        $paginate_number = $this->paginate_number;
        $query = $request['query'];

        if ($query != '') {
            $categories = Category::where('name', 'LIKE', '%'.$query.'%')->paginate($paginate_number);
            return view('category.category', compact('categories','paginate_number'));
        } else {
            return redirect('categories');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        //
        $input = $request->all();
        try {
            $category = Category::create($input);

            if ($file = $request->file('image')) {

                $name = 'category_'.$category->id.'.'.$file->getClientOriginalExtension();

                $file->move('images/category', $name);
                $category->image()->create(['category_id' => $category->id, 'name' => $name]);
            }

            Session::flash('message', 'Category Added');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed '.$e->getMessage());
        }

        return redirect('/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $url = $request->input('url');
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->input('name');

            if ($file = $request->file('image')) {

                if (file_exists($old_file = public_path().'/images/category/'.$category->image->name)) { // if category has photo already and if it exists
                    unlink($old_file); // unlink the old image
                }

                $name = 'category_'.$id.'.'.$file->getClientOriginalExtension();
                $file->move('images/category', $name);
                $category->image->name = $name;
            }
            $category->push();

            Session::flash('message', 'Update Success');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed '.$e->getMessage());
        }
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        try {
            $category = Category::findOrFail($id);
            if (file_exists($file = public_path().'/images/category/'.$category->image->name)) {
                unlink($file);
            }

            $category->delete();
            Session::flash('message', 'Delete Success');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed '.$e->getMessage());
        }
        return redirect('/categories');
    }
}
