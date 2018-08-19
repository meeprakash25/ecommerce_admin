<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductAddImageRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
    private $paginate_number = 3;

    public function index()
    {
        //
        $paginate_number = $this->paginate_number;
        $products = Product::paginate($paginate_number);
        return view('product.product', compact('products', 'paginate_number'));
    }

    public function addImage($id)
    {
        return view('product.add-image', compact('id'));
    }

    public function saveImage(ProductAddImageRequest $request, $id)
    {
        $previous_url = $request->input('url');
        try {
            $product = Product::findOrFail($id);
            if ($file = $request->file('image')) {

                $name = 'product_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();

                $file->move('images/product', $name);
                $product->images()->create(['product_id' => $product->id, 'name' => $name]);
            }

            Session::flash('message', 'Image Added');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed'.$e->getMessage());
        }

        return redirect($previous_url);
    }


    public function search(Request $request)
    {
        $paginate_number = $this->paginate_number;
        $query = $request['query'];

        if ($query != '') {
            $products = Product::where('name', 'LIKE', '%'.$query.'%')->paginate($paginate_number);
            return view('product.product', compact('products', 'paginate_number'));
        } else {
            return redirect('products');
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
        $categories = Category::pluck('name', 'id');
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        //

        $input = $request->all();
        try {
            $product = Product::create($input);

            if ($file = $request->file('image')) {

                $name = 'product_'.$product->id.'_'.time().'.'.$file->getClientOriginalExtension();

                $file->move('images/product', $name);
                $product->images()->create(['product_id' => $product->id, 'name' => $name]);
            }

            Session::flash('message', 'Product Added');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed'.$e->getMessage());
        }

        return redirect('/products');
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
        return redirect('products');
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
        $product = Product::findOrFail($id);
        // return $product->status;

        $categories = Category::pluck('name', 'id');
        // return$categories;
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        //
        $url = $request->input('url');
        try {
            $product = Product::findOrFail($id);

            // if ($file = $request->file('image')) { // since its a one to many relationship
            // foreach ($product->images as $image) {
            //     if (file_exists($old_file = public_path().'/images/product/'.$image->name)) { // no need to unlink since product can have many images
            //         unlink($old_file); // unlink the old image
            //     }
            // }

            //     $name = 'product_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();
            //     $file->move('images/product', $name);
            //     $product->images()->create(['product_id' => $product->id, 'name' => $name]);
            // }

            $product->name = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->stock = $request->input('stock');
            $product->price = $request->input('price');
            $product->status = $request->input('status');
            $product->description = $request->input('description');
            $result = $product->push();

            if ($result) {
                Session::flash('message', 'Update Success');
            } else {
                Session::flash('message', 'Update Failed');
            }
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
    public function destroy($id)
    {
        //
        try {
            $product = Product::findOrFail($id);
            foreach ($product->images as $image) {
                if (file_exists($file = public_path().'/images/product/'.$image->name)) {
                    unlink($file);
                }
            }


            $product->delete();
            Session::flash('message', 'Delete Success');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed '.$e->getMessage());
        }
        return redirect('/products');
    }
}
