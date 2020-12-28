<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Pegawai;
use Auth;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $nama_petugas = DB::table('master_petugas')->pluck('nama_petugas', 'id');
        $jasa_pengirim = DB::table('master_jasa_pengiriman')->pluck('nama_jasa_pengirim', 'id');
        $kategori = DB::table('master_kategori_paket')->pluck('nama_kategori', 'id');
        $jenis_penerima = DB::table('master_jenis_penerima')->pluck('jenis_penerima', 'id');

        //$pegawai = DB::table('master_pegawai')->pluck('nama_pegawai', 'id');
        return view('transaksi.create', compact('nama_status', 'nama_petugas', 'jasa_pengirim', 'kategori', 'jenis_penerima'));
    }

    public function autocomplete(Request $request)
    {
        if($request->get('term'))
        {
          $search = $request->get('term');
          $result  = Pegawai::where('nama_pegawai', 'LIKE', '%'. $search. '%')->get();
          //dd($query);
          return response()->json($result);
        }
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
        $transaksi->petugas = $request->get('penerima');
        $transaksi->status = $request->get('status');
        $transaksi->jumlah = 1;

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
       ->join('master_jenis_penerima', 'transaksis.jenis_diklat', '=', 'master_jenis_penerima.id' )
       ->join('master_jasa_pengiriman', 'transaksis.jasa_pengirim', '=', 'master_jasa_pengiriman.id' )
       ->join('master_petugas', 'transaksis.petugas', '=', 'master_petugas.id' )
       ->select('transaksis.*', 'master_petugas.nama_petugas', 'master_status_paket.nama_status', 'master_kategori_paket.nama_kategori', 'master_jenis_penerima.jenis_penerima', 'master_jasa_pengiriman.nama_jasa_pengirim')
       ->get();
         //dd($transaksis);
       return view('transaksi.show', compact('transaksis'));
   }

    /**
     * Display the specified resource base on status packet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rekapstatus($status)
    {
       $transaksis = DB::table('transaksis')
       ->where('status', $status)
       ->join('master_status_paket', 'transaksis.status', '=', 'master_status_paket.id' )
       ->join('master_kategori_paket', 'transaksis.kategori', '=', 'master_kategori_paket.id' )
       ->join('master_jenis_penerima', 'transaksis.jenis_diklat', '=', 'master_jenis_penerima.id' )
       ->join('master_jasa_pengiriman', 'transaksis.jasa_pengirim', '=', 'master_jasa_pengiriman.id' )
       ->join('master_petugas', 'transaksis.petugas', '=', 'master_petugas.id' )
       ->select('transaksis.*', 'master_petugas.nama_petugas', 'master_status_paket.nama_status', 'master_kategori_paket.nama_kategori', 'master_jenis_penerima.jenis_penerima', 'master_jasa_pengiriman.nama_jasa_pengirim')
       ->get();

       return view('transaksi.rekapstatus', compact('transaksis', 'status'));
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
        $jenis_penerima = DB::table('master_jenis_penerima')->get();
        $status = DB::table('master_status_paket')->get();
        $kategori = DB::table('master_kategori_paket')->get();
        $jasa_pengirim = DB::table('master_jasa_pengiriman')->get();
        $nama_petugas = DB::table('master_petugas')->get();

        $transaksi = DB::table('transaksis')
        ->where('transaksis.id', $id)
        ->first();
        //dd($transaksi);
        return view('transaksi.edit', compact('transaksi','id', 'jenis_penerima', 'status', 'kategori', 'jasa_pengirim', 'nama_petugas'));
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
        $transaksi->petugas = $request->get('penerima');
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

    public function getDistinctMY()
    {
        $MY = DB::table('transaksis')->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        ->groupby('year','month')
        ->get();
        
        dd($MY);
    }
}
