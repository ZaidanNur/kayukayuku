<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\CancelOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Midtrans\Notification;
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


        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server-key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => 'MDTRNS-'.$product->id,
                'gross_amount' => (int)$product->product->product_price*$product->amount,
            ),
            'customer_details'=>[
                'first_name'=>'zaidan',
                'email'=>'zaixyz332@gmail.com',
            ],
            'item_details'=>[
                ['id'=>$product->product->id,
                'price'=>$product->product->product_price,
                'quantity'=>(int)$product->amount,
                'name'=>$product->product->product_name]
            ],
            // 'enabled_payments'=>['gopay'],
            // 'vtweb'=>[]
        );

        // dd($params);
        try {
            // ambil halaman payment midtrans
            // Get Snap Payment Page URL
            // dd('here');
            $paymentUrl = Snap::createTransaction($params)->redirect_url;

            // Redirect to Snap Payment Page
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // // Set your Merchant Server Key
        // Config::$serverKey = config('midtrans.server-key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // Config::$isProduction = config('midtrans.isProduction');
        // // Set sanitization on (default)
        // Config::$isSanitized = config('midtrans.isSanitized');
        // // Set 3DS transaction for credit card to true
        // Config::$is3ds = config('midtrans.is3ds');

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => 'MDTRNS-'.$product->id,
        //         'gross_amount' => (int)$product->product->product_price*$product->amount,
        //     ),
        //     'customer-detail'=>[
        //         'first_name'=>'zaidan',
        //         'email'=>'zaixyz332@gmail.com',
        //     ],
        //     'enabled_payments'=>['gopay'],
        //     'vtweb'=>[]
        // );

        // try {
        //     // ambil halaman payment midtrans
        //     // Get Snap Payment Page URL
        //     // dd('here');
        //     $paymentUrl = Snap::createTransaction($params)->redirect_url;

        //     // Redirect to Snap Payment Page
        //     header('Location: ' . $paymentUrl);
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }



        // return redirect()->route('carts.index')->with('success',('Berhasil melakukan pemesanan'));
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

    function notificationHandler(Request $request){
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server-key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('midtrans.is3ds');

        // Instance midtrans notification
        $notif = new Notification();

        // aasign variable
        $status = $notif->transaction_status;
        $type = $notif->paymeny_type;
        $fraud = $notif->fraud_status;
        $orderID = $notif->order_id;

        $order = Order::findOrFail((int)explode('-',$orderID)[1]);
        // dd($order);
        // Handle notification status midtrans

        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->status = 'Pembayaran Ditolak';
                }else{
                    $order->status = 'Pesanan Diproses';
                }
            }
        }else if  ($status == 'settlement'){
            $order->status = 'Pesanan Diproses';
        }else if  ($status == 'deny'){
            $order->status = 'Pembayaran Ditolak';
        }else if  ($status == 'expire'){
            $order->status = 'Pembayaran Ditolak';
        }else if  ($status == 'cancel'){
            $order->status = 'Dibatalkan Oleh Customer';
        }


        $order->save();

        if ($status == 'capture' && $fraud == 'challenge') {
            return response()->json([
                'meta'=>[
                    'code'=>200,
                    'message'=>'Midtrans Payment Challenge'
                ]
            ]);
        }

        return response()->json([
            'meta'=>[
                'code'=>200,
                'message'=>'Midtrans notication success.'
            ]
        ]);
    }
}
