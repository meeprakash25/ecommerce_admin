<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingUpdateRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
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
     * @return array
     */
    public function index()
    {
        //
        $settings = Setting::findOrFail(1);
        return view('setting.setting', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return route('setting.index');
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
        $setting = Setting::findOrFail($id);
        $currency_db = Setting::pluck('currency', 'id');


        $currency_list = $setting->currency_info();
        // $currency_list = array_column($currency, 'name', 'code'); // this does the work

        foreach ($currency_list as $currency) {
            $currency_pair[$currency['code']] = $currency['code'].' - '.$currency['name'];
        }

        return view('setting.edit', compact('setting', 'currency_db', 'currency_pair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request)
    {
        //
        try {
            $update = DB::table('settings')
                ->where('id', 1)
                ->update
                ([
                    'tax'      => $request->tax,
                    'currency' => $request->currency,
                ]);

            if ($update !== false) {
                //updated
                Session::flash('message', 'Update Success');
            } else {
                //Not updated
                Session::flash('erroe', 'Update Failed');
            }

        } catch (\Exception $e) {
            Session::flash('error', 'Failed '.$e->getMessage());
        }

        return back();
        // return redirect()->back();

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
    }
}
