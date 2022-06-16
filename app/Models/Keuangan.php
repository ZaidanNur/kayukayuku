<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_kegiatan','jumlah_pemsukan','jumlah_pengeluaran','keterangan','tanggal'

    ];
    
    protected $hidden =[];

    protected $table = 'keuangan';

    public function order(){
        // return $this->belongsTo(Order::class,'order_id','id');
    }
}
