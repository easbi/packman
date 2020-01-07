<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_status = DB::table('master_status_paket')->pluck('nama_status', 'id');
        return view('transaksi.create', compact('nama_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new \App\Transaksi;
        $transaksi->nama_penerima = $request->get('nama_penerima');
        $transaksi->jenis_diklat = $request->get('jenis_diklat');
        $transaksi->kategori = $request->get('kategori');
        $transaksi->jasa_pengirim = $request->get('jasa_pengirim');
        $transaksi->penerima = $request->get('penerima');
        $transaksi->status = $request->get('status');

        # start syntax to renumbering packet each month
        $month = date('Y-m');
        $noPaketMax = DB::table('transaksis')->where('created_at', 'LIKE', $month.'%')->max('no_paket');
        if ($noPaketMax) {
            $noPaketMax = substr($noPaketMax, 2, 4);
        }
        $noPaketMax++;

        if ($noPaketMax < 10) {
            $noPaketMax = '00'.$noPaketMax;
        } elseif ($noPaketMax >= 10 && $noPaketMax < 100) {
            $noPaketMax = '0'.$noPaketMax;
        } else {
            $noPaketMax = $noPaketMax;
        }
        $no_paket = date('m').$noPaketMax;        
        $transaksi->no_paket = $no_paket;

        $transaksi->save();

        return redirect('transaksis/show')->with('sucsess', 'Data transaksi telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $transaksis = DB::table('transaksis')
         ->join('master_status_paket', 'transaksis.status', '=', 'master_status_paket.id' )
         ->join('master_kategori_paket', 'transaksis.kategori', '=', 'master_kategori_paket.id' )
         ->select('transaksis.*', 'master_status_paket.nama_status', 'master_kategori_paket.nama_kategori')
         ->get();
         //dd($transaksis);
         return view('transaksi.show', compact('transaksis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit transaksi data
        $transaksi = \App\Transaksi::find($id);
        return view('transaksi.edit', compact('transaksi','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = \App\Transaksi::find($id);
        $transaksi->nama_penerima = $request->get('nama_penerima');
        $transaksi->jenis_diklat = $request->get('jenis_diklat');
        $transaksi->kategori = $request->get('kategori');
        $transaksi->jasa_pengirim = $request->get('jasa_pengirim');
        $transaksi->penerima = $request->get('penerima');
        $transaksi->status = $request->get('status');
        $transaksi->save();

        return redirect('transaksis/show')->with('sucsess', 'Data transaksi telah ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = \App\Transaksi::find($id);
        $transaksi->delete();
        return redirect('transaksis')->with('success','Data transaksi telah dihapus');
    }

    public function monitoring()
    {
       $status1 = DB::table('transaksis')->select('status')->where('status', '=', 3)->count();
       $status2 = DB::table('transaksis')->select('status')->where('status', '=', 1)->count();
       $status3 = DB::table('transaksis')->select('status')->where('status', '=', 2)->count();
       $statust = DB::table('transaksis')->select('status')->count();
       return view('transaksi.monitoring', compact('status1', 'status2', 'status3', 'statust'));
    }
}
