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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(1);
        return view('category.category', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request['query'];

        if ($query != '') {
            $categories = Category::where('name', 'LIKE', '%'.$query.'%')->paginate(1);
            return view('category.category', compact('categories'));
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
        // return $request;
        // ['name'=>$request->name]
        try {
            $result = $category = Category::create($input);

            if ($file = $request->file('image') && $result) {

                $name = 'category_'.$category->id.'.'.$file->getClientOriginalExtension(); // $name = category_(lastinserted id).ext

                $file->move('images/category', $name);
                Image::create(['category_id' => $category->id, 'name' => $name]);
            }

            Session::flash('message', 'Category Added');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed'.$e->getMessage());
        }

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect('categories');
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
        //
        $category = new Category();

        $result = $category->whereId($id)->update(['name' => $request->name]);

        if ($file = $request->file('image') && $result) {

            $name = 'category_'.$category->id.'.'.$file->getClientOriginalExtension(); // image name will be the same as old database image name so no need to update images table
            $file->move('images/category', $name);
        }


        Session::flash('message', 'Update Success');

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);

        $file = public_path().$category->image->name;
        if (file_exists('your_file_name')) {
            unlink($file);
        }

        $category->delete();
        Session::flash('message', 'Delete Success');

        return redirect('/categories');
    }
}
