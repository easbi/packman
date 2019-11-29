@extends('layout.main')
@section('content')

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->

<div class="container-fluid gtco-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> We promise to bring
                    the best <span>solution</span> for
                    your packet. </h1>
                <p> Check Your Packet Here </p>
                <a href="#">Contact Us <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            <div class="col-md-6">
                <div class="card"><img class="card-img-top img-fluid" src="images/banner-img.png" alt=""></div>
            </div>
        </div>
    </div>
</div>

 <div class="container">
      <br />
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <table class="table table-striped">
        <thead>
          <tr>
           {{--  <th>ID</th> --}}
           <th>Nama Penerima</th>
           <th>Kode Paket</th>
           <th>Jenis Diklat</th>
           <th>Kategori</th>
           <th>Jasa Pengirim</th>
           <th>Status</th>
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
          <td>{{$transaksi['status']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection