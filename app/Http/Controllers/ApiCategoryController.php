<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use App\Category;
use App\Http\Resources\ApiCategoryResource;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    //

    private $paginate_number = 10;

    public function index(Request $request)
    {
        //
        if (isset($request['accesskey'])) {
            if ($request['accesskey'] === ApiCategory::accesskey()) {
                $paginate_number = $this->paginate_number;
                $categories = Category::paginate($paginate_number);
                return ApiCategoryResource::collection($categories);
            } else {
                return 'Access key mismatch';
            }
        } else {
            return 'Access key is required';
        }
    }
}
