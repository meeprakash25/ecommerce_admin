<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use App\Http\Resources\ApiSettingResource;
use App\Setting;
use Illuminate\Http\Request;

class ApiSettingController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if (isset($request['accesskey'])) {
            if ($request['accesskey'] === ApiCategory::accesskey()) {
                $settings = Setting::findOrFail(1);
                ApiSettingResource::withoutWrapping();
                return new ApiSettingResource($settings);
            } else {
                return 'Access key mismatch';
            }
        } else {
            return 'Access key is required';
        }
    }
}
