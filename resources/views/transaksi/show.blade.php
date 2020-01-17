@extends('layout.main')
@section('content')
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
           <th>No</th>
           <th>Nama Penerima</th>
           <th>Kode Paket</th>
           <th>Jenis Diklat</th>
           <th>Kategori</th>
           <th>Jasa Pengirim</th>
           <th>Tanggal Diterima</th>
           {{-- <th>Tanggal Perubahan Terakhir</th> --}}
           <th>Status</th>
           <th>Penerima</th>
           <th>Edit</th>
         </tr>
       </thead>
       <tbody>

        @foreach($transaksis as $transaksi)
        <tr>
          {{-- <td>{{$transaksi['id']}}</td> --}}
          <td>{{$transaksi->id}}</td> 
          <td>{{$transaksi->nama_penerima}}</td>
          <td>{{$transaksi->no_paket}}</td>
          <td>{{$transaksi->jenis_penerima}}</td>
          <td>{{$transaksi->nama_kategori}}</td>
          <td>{{$transaksi->nama_jasa_pengirim}}</td>
          <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->formatLocalized('%d-%b-%Y %H:%M') }} WIB</td>
          <td>{{$transaksi->nama_status}}</td>          
          <td>{{$transaksi->nama_petugas}}</td>
          <td><a href="{{ action('TransaksiController@edit', $transaksi->id) }}" class="btn btn-warning">Edit</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  

@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
      $('#table_id').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": 
        [{
          "targets": 8,
          "orderable": false
        }]
      });
  });
  </script>
@endpush