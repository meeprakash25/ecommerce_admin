<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller
{

    private $paginate_number = 5;

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
    public function index()
    {
        //
        $paginate_number = $this->paginate_number;
        $orders = Order::paginate($paginate_number);
        return view('order.order', compact('orders', 'paginate_number'));
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
        $order = Order::findOrFail($id);
        // parse order list into array
        $order_list = explode(',', $order['order_list']);

        return view('order.detail', compact('order', 'order_list'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $order = Order::findOrFail($id);
            $order->status = $request->input('status');
            // return $order->status;
            $result = $order->push();
            if ($result) {
                Session::flash('message', 'Update Success');
            } else {
                Session::flash('error', 'Update Failed');
            }
            return redirect('/orders');
        } catch (\Exception $e) {
            Session::flash('error', 'Failed '.$e->getMessage());
        }
        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $url = $request->input('url');
        //
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            Session::flash('message', 'Delete Success');
        } catch (\Exception $e) {
            // do task when error
            Session::flash('error', 'Failed '.$e->getMessage());
        }
        return redirect($url);
    }
}
