<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {   $items = Product::all();
        $galleries = Gallery::all();
        return view('pages.company',[
            'items'=>$items,
            'galleries'=>$galleries
        ]);
    }
}
