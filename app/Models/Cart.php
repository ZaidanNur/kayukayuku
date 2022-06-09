<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id','slug','product_id','jumlah'

    ];

    protected $hidden =[];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
        
}