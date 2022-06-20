<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Keuangan;
use App\Models\CancelOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        return view('pages.admin.order.index',[
            'items'=>$items
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();
        $product = Product::findOrFail($data['product_id']);
        $new_product = Product::findOrFail($data['product_id'])->toArray();
        $new_product['product_stock'] = $new_product['product_stock']-$data['amount'];
        
        
        
        Order::create($data);
        $product->update($new_product);


        
        return redirect()->route('order-admin.order')->with('success','Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function order()
    {
        $items = Product::all();
        $orders = Order::with(['product'])->get();
        return view('pages.admin.order.order.order',[
            'items'=>$items,
            'orders'=>$orders
        ]);
    }

    public function order_detail(Order $order)
    {
        $items = Product::all();
        return view('pages.admin.order.order.orderDetail',[
            'items'=>$items,
            'order'=>$order
        ]);
    }

    public function order_edit(Request $request,$id)
    {
        $data = $request->all();
        // dd($data);
        $order = Order::findOrFail($id);

        $order ->update($data);

        return redirect()->route('order-admin.order')->with('success','Data pesanan dengan kode '.$id.' berhasil diubah');
    }

    public function payment_confirmation_index($id)
    {
        $items = Product::all();
        $payment = Payment::with(['order','order.product'])->where('order_id',$id)->first();
        return view('pages.admin.order.order.paymentConfirmation',[
            'items'=>$items,
            'payment'=>$payment

        ]);
    }

    public function payment_confirmation_accept($id)
    {
        $payment = Payment::findOrFail($id);
        
        $new_payment = Payment::findOrFail($id)->toArray();
        $new_payment['payment_status'] = 'Diterima';
        
        $payment->update($new_payment);
        
        $order = Order::findOrFail($payment['order_id']);
        $new_order =  Order::with('product')->findOrFail($payment['order_id'])->toArray();
        $new_order['status'] = 'Pesanan Diproses';

        $order->update($new_order);

        // dd($new_order);
        // dd($new_payment);


        $pemasukan = [
            'nama_barang'=>$new_order['product']['product_name'],
            'jumlah_pemasukan'=>$new_order['amount'] * $new_order['product']['product_price'],
            'jumlah_pengeluaran'=>0,
            'keterangan'=>'Penjualan '.$new_order['product']['product_name'],
            'tanggal'=>Carbon::now()
        ];

        Keuangan::create($pemasukan);

        return redirect()->route('order-admin.order')->with('success','Pembayaran berhasil dikonfirmasi');


    }

    public function payment_confirmation_rejected($id)
    {
        $payment = Payment::findOrFail($id);
        
        $new_payment = Payment::findOrFail($id)->toArray();
        $new_payment['payment_status'] = 'Ditolak';
        
        $payment->update($new_payment);
        
        $order = Order::findOrFail($payment['order_id']);
        $new_order =  Order::findOrFail($payment['order_id'])->toArray();
        $new_order['status'] = 'Pembayaran Ditolak';

        $order->update($new_order);

        $new_cancel_order =[
            'order_id'=> $payment['order_id'],
            'reason'=> 'Pembayaran Ditolak'
        ];

        CancelOrder::create($new_cancel_order);

        return redirect()->route('order-admin.order')->with('success','Pembayaran berhasil dikonfirmasi');
    }

    public function order_status_change(Request $request)
    {
        $data = $request->all();

        $order = Order::findOrFail($data['id']);
        $new_order =  Order::findOrFail($data['id'])->toArray();
        $new_order['status'] = $data['status'];

        if ($data['status'] == 'Dibatalkan') {
            $new_cancel_order =[
                'order_id'=> $data['id'],
                'reason'=> 'Dibatalkan oleh admin'
            ];

            CancelOrder::create($new_cancel_order);
        }

        $order->update($new_order);

        return redirect()->route('order-admin.order')->with('success','Status pesanan berhasil diubah');
    }

    public function canceled_order()
    {
        $items = Product::all();
        $canceled_order = CancelOrder::with(['order','order.product'])->get();
        return view('pages.admin.order.canceled.canceledOrder',[
            'items'=>$items,
            'cancel_orders'=>$canceled_order
        ]);
    }
}
