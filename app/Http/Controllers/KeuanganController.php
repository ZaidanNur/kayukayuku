<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Keuangan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        $keuangan = Keuangan::all();
        $pemasukan = Keuangan::select(DB::raw('SUM(jumlah_pemasukan) as total_pemasukan'))->first();
        $pengeluaran = Keuangan::select(DB::raw('SUM(jumlah_pengeluaran) as total_pengeluaran'))->first();
        // dd($keuangan);
        return view('pages.admin.keuangan.keuangan',[
            'items'=>$items,
            'keuangan'=>$keuangan,
            'pemasukan'=>$pemasukan,
            'pengeluaran'=>$pengeluaran
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
     * @param  \App\Http\Requests\StoreKeuanganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeuanganRequest $request)
    {
        $data = $request ->all();
        
        $pengeluaran = [
            'nama_barang'=>$data['nama_barang'],
            'jumlah_pemasukan'=>0,
            'jumlah_pengeluaran'=>$data['harga_barang'],
            'keterangan'=>$data['keterangan'],
            'tanggal'=>$data['tanggal']
        ];

        
        Keuangan::create($pengeluaran);

        return redirect()->route('keuangan.index')->with('success','Data pengeluaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeuanganRequest  $request
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keuangan $keuangan)
    {
        //
    }
    public function pengeluaran_index()
    {

        
        $pengeluaran = Keuangan::where('jumlah_pengeluaran','!=',0)->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pengeluaran',[
            'pengeluaran'=>$pengeluaran,
            'items'=>$items
        ]);
    }

    public function pengeluaran_this_mount_index()
    {

        
        $pengeluaran = Keuangan::where('jumlah_pengeluaran','!=',0)->whereMonth('tanggal','=',Carbon::now()->month)->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pengeluaran',[
            'pengeluaran'=>$pengeluaran,
            'items'=>$items
        ]);
    }
    public function pengeluaran_today_index()
    {

        
        $pengeluaran = Keuangan::where('jumlah_pengeluaran','!=',0)->where('tanggal','=',Carbon::now())->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pengeluaran',[
            'pengeluaran'=>$pengeluaran,
            'items'=>$items
        ]);
    }

    public function pemasukan_index()
    {        
        $pemasukan = Keuangan::where('jumlah_pemasukan','!=',0)->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pemasukan',[
            'pemasukan'=>$pemasukan,
            'items'=>$items
        ]);
    }
    public function pemasukan_this_month_index()
    {        
        $pemasukan = Keuangan::where('jumlah_pemasukan','!=',0)->whereMonth('tanggal','=',Carbon::now()->month)->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pemasukan',[
            'pemasukan'=>$pemasukan,
            'items'=>$items
        ]);
    }
    public function pemasukan_today_index()
    {        
        $pemasukan = Keuangan::where('jumlah_pemasukan','!=',0)->where('tanggal','=',Carbon::now())->get();
        $items = Product::all();

        return view('pages.admin.keuangan.pemasukan',[
            'pemasukan'=>$pemasukan,
            'items'=>$items
        ]);
    }

}
