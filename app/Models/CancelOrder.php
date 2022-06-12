<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CancelOrder extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id','reason'

    ];
    
    protected $hidden =[];

    protected $table = 'canceled_orders';

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
