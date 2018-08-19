<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ApiCategory extends Model
{
    //
    public static function accesskey(){
        return Config::get('constants.accesskey');
    }
}
