<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['products'])->orderBy('product_id','asc')->get();

        

        $products = Product::all();
        return view('pages.admin.gallery.gallery',[
            'items'=>$items,
            'products'=>$products
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
    public function store(GalleryRequest $request)
    {
        $data = $request ->all();
        $data['image'] = $request->file('image')->store('assets/gallery','public');
        $product = Product::findOrFail($data['product_id']);
        
        Gallery::create($data);

        return redirect()->route('galleries.index')->with('success',('Gallery data for '.$product->product_name.' added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        return view('pages.admin.gallery.edit',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request,$id)
    {
        $data = $request ->all();
        $data['image'] = $request->file('image')->store('assets/gallery','public');
        $product = Product::findOrFail($data['product_id']);

        $item = Gallery::findOrFail($id);

        $item -> update($data);

        return redirect()->route('galleries.index')->with('success',('Gallery data for '.$product->product_name.' has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $product = Product::findOrFail($item->product_id);
        $item -> delete();

        return redirect()->route('galleries.index')->with('success','Gallery data for '.$product->product_name.' has been successfully deleted');
    }

    public function details($id)
    {
        $item = Gallery::findOrFail($id);
        $galleries = Gallery::all();
        return view('pages.galleryDetails',[
            'item' => $item,
            'galleries'=>$galleries
        ]);
    }
}
