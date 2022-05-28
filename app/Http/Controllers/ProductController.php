<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ChangeLog;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        $galleries = Gallery::with(['products'])->orderBy('product_id','asc')->get();
        
        if ($items->count()==0) {
            $items = null;
        }
        return view('pages.admin.product.product',[
            'items'=>$items,
            'galleries'=>$galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request ->all();
        $data['slug']=Str::slug($request->product_name);


        $product = Product::create($data);
        
        $log = [
            'product_id'=>$product->id,
            'stock_added'=>$data['product_stock'],
            'stock_reduced'=> null,
        ];

        
        ChangeLog::create($log);

        return redirect()->route('products.index')->with('success',($request->product_name.' product data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        return view('pages.admin.product.edit',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,$id)
    {
        $data = $request ->all();
        $data['slug']=Str::slug($request->product_name);
        $item = Product::findOrFail($id);

        $item -> update($data);

        return redirect()->route('products.index')->with('success',($request->product_name.' product data has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $log = [
            'product_id'=>$item->id,
            'stock_added'=>null,
            'stock_reduced'=> $item->product_stock,
        ];

        
        ChangeLog::create($log);
        $item -> delete();

        return redirect()->route('products.index');
    }

    public function details($id)
    {
        $item = Product::findOrFail($id);
        $galleries = Gallery::all();
        return view('pages.productDetails',[
            'item' => $item,
            'galleries'=>$galleries
        ]);
    }

    public function barang()
    {
        $items = Product::all();
        $galleries = Gallery::all();
        return view('pages.barang',[
            'items' => $items,
            'galleries'=>$galleries
        ]);
    }
}
