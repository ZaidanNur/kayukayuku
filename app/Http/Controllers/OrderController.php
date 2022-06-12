<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\CancelOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->with(['product'])->get();
        $images = Gallery::all();
        // dd($orders);
        return view('pages.order',[
            'orders'=>$orders,
            'images'=>$images
        ]);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request ->all();
        $product = Order::create($data);
        
        
        $cart_id = $data['cart_id'];
        $cart_item = Cart::findOrFail($cart_id);
        $cart_item -> delete();

        return redirect()->route('carts.index')->with('success',('Berhasil melakukan pemesanan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('pages.orderDetail',[
            'order'=>$order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cancel_order(UpdateOrderRequest $request)
    {
        $data = $request->all();
        $order = Order::findOrFail($data['order_id']);
        $new_order = Order::findOrFail($data['order_id'])->toArray();

        $new_order['status'] = "Dibatalkan Oleh Customer";
        $order->update($new_order);

        CancelOrder::create($data);
        
        return redirect()->route('orders.index')->with('success',('Pesanan berhasil dibatalkan'));
    }
}
