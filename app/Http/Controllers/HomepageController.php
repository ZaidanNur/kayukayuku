<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $items = Product::take(6)->get();
        $galleries = Gallery::all();
        return view('home',[
            'items'=>$items,
            'galleries'=>$galleries
        ]);
    }
}
