@extends('layout.main')
@section('content')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> 

 <div class="container">
      <br />
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <table id="table_id" class="display">
        <thead>
          <tr>
           {{--  <th>ID</th> --}}

           <th>Nama Penerima</th>
           <th>Kode Paket</th>
           <th>Jenis Diklat</th>
           <th>Kategori</th>
           <th>Jasa Pengirim</th>
           <th>Tanggal Diterima</th>
           {{-- <th>Tanggal Perubahan Terakhir</th> --}}
           <th>Status</th>
           <th>Edit</th>
         </tr>
       </thead>
       <tbody>

        @foreach($transaksis as $transaksi)
        <tr>
          {{-- <td>{{$transaksi['id']}}</td> --}} 
          <td>{{$transaksi['nama_penerima']}}</td>
          <td>{{$transaksi['no_paket']}}</td>
          <td>{{$transaksi['jenis_diklat']}}</td>
          <td>{{$transaksi['kategori']}}</td>
          <td>{{$transaksi['jasa_pengirim']}}</td>
          <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->formatLocalized('%d-%b-%Y %H:%M') }} WIB</td>
          {{-- <td>{{ \Carbon\Carbon::parse($transaksi->updated_at)->format('D, d M Y H:i') }} WIB</td> --}}
          <td>{{$transaksi['status']}}</td>
          <td><a href="{{ action('TransaksiController@edit', $transaksi['id']) }}" class="btn btn-warning">Edit</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#table_id').DataTable({
        "order": [[ 5, "desc" ]],
        "columnDefs": 
        [{
          "targets": 7,
          "orderable": false
        }]
      });
  });
  </script>

@endsection