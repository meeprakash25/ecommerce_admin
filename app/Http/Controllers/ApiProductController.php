<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use App\Http\Resources\ApiProductByCayegoryResource;
use App\Http\Resources\ApiProductResource;
use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{

    public function index(Request $request, $id)
    {
        if (isset($request['accesskey'])) {
            if ($request['accesskey'] === ApiCategory::accesskey()) {
                // get category
                $product = Product::with('images')->findOrFail($id);
                // return single category as resource
                return new ApiProductResource($product);
            } else {
                return 'Access key mismatch';
            }
        } else {
            return 'Access key is required';
        }
    }

    //
    public function productByCategory(Request $request, $category_id)
    {
        if (isset($request['accesskey'])) {
            if ($request['accesskey'] == ApiCategory::accesskey()) {
                // get category
                $products = Product::with('images')->where('category_id', $category_id)->paginate(10);
                // return $products;
                // ApiProductResource::withoutWrapping();
                return new ApiProductByCayegoryResource($products);
            } else {
                return 'Access key mismatch';
            }
        } else {
            return 'Access key is required';
        }
    }
}
