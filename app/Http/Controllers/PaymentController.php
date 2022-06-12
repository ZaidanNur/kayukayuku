<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Gallery;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pages.paymentConfirm');
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
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->all();
        $data['payment_proof'] = $request->file('payment_proof')->store('payment/proof','public');
        Payment::create($data);

        $order = Order::findOrFail($data['order_id']);
        $new_order = Order::findOrFail($data['order_id'])->toArray();
        $new_order['status'] = 'Menunggu Konfirmasi Admin';

        $order->update($new_order);

        return redirect()->route('orders.index')->with('success','Konfirmasi pembayaran berhasil dilakukan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        dd($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function show_payment_confirmation(Order $order)
    {
        // dd($order);
        $images = Gallery::all();
        return view('pages.paymentConfirm',[
            'order'=>$order,
            'images'=>$images
        ]);
    }
}
