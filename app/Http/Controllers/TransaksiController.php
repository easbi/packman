<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = \App\Transaksi::orderBy('created_at', 'desc')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
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
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->kategori = $request->get('kategori');
        $transaksi->jasa_pengirim = $request->get('jasa_pengirim');
        $transaksi->status = $request->get('status');
        $transaksi->save();

        return redirect('transaksis')->with('sucsess', 'Data transaksi telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $transaksis = \App\Transaksi::orderBy('created_at', 'desc')->get();
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
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->kategori = $request->get('kategori');
        $transaksi->jasa_pengirim = $request->get('jasa_pengirim');
        $transaksi->status = $request->get('status');
        $transaksi->save();

        return redirect('transaksis')->with('sucsess', 'Data transaksi telah ditambahkan');
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
}
