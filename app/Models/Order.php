<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id','name','product_id','amount','phone_number','address','note','status'

    ];
    // Menunggu Pembayaran, Menunggu Konfirmasi Admin, Pembayaran ditolak, Diproses, Dikirim, Terkirim, Dibatalkan
    protected $hidden =[];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
