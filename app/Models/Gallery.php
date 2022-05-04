<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'product_id','image'

    ];

    protected $hidden =[
        
    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
