<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use App\Order;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        if (isset($request['accesskey'])) {
            if ($request['accesskey'] === ApiCategory::accesskey()) {
                $order = new Order;
                $order->name = $request->name;
                $order->address = $request->address;
                $order->city = $request->city;
                $order->province = $request->province;
                $order->shipping_type = $request->shipping_type;
                $order->date_time = $request->date_time;
                $order->phone = $request->phone;
                $order->order_list = $request->order_list;
                $order->comment = $request->comment;
                $order->email = $request->email;
                $order->status = $request->status;

                if ($order->save()) {
                    // $order->orderSuccessNotification($request->email);
                    return 'Your order has been successfully placed!!!';
                } else {
                    return 'Failed';
                }
            } else {
                return 'Access key mismatch';
            }
        } else {
            return "Access key mismatch";
        }
    }
}
