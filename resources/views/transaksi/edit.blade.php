@extends('layout.main')
@section('content')

	<div class="container">
		<h2>Edit transaksi</h2><br/>
		<form method="post" action="{{action('TransaksiController@update', $id)}}" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="nama_penerima">Nama Penerima:</label>
					<input type="text" class="form-control" name="nama_penerima" value="{{ $transaksi->nama_penerima}}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="jenis_diklat">Jenis Diklat :</label>
					<input type="text" class="form-control" name="jenis_diklat" value="{{ $transaksi->jenis_diklat}}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="jumlah">Jumlah :</label>
					<input type="text" class="form-control" name="jumlah" value="{{ $transaksi->jumlah}}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="kategori">Kategori :</label>
					<select class="form-control" name="kategori">
						<option value="Makanan"  @if($transaksi->kategori=="Makanan") selected @endif>Makanan</option>
						<option value="Dokumen"  @if($transaksi->kategori=="Dokumen") selected @endif>Dokumen</option>
						<option value="Elektronik"  @if($transaksi->kategori=="Elektronik") selected @endif>Elektronik</option>
						<option value="Pakaian"  @if($transaksi->kategori=="Pakaian") selected @endif>Pakaian</option>
						<option value="Lainnya"  @if($transaksi->kategori=="Lainnya") selected @endif>lainnya</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="jasa_pengirim">Jasa Pengirim :</label>
					<select class="form-control" name="jasa_pengirim">
						<option value="TIKI" @if($transaksi->jasa_pengirim=="TIKI") selected @endif>TIKI</option>
						<option value="JNE" @if($transaksi->jasa_pengirim=="JNE") selected @endif>JNE</option>
						<option value="J&amp;T" @if($transaksi->jasa_pengirim=="J&amp;T") selected @endif>J&amp;T</option>
						<option value="Sicepat" @if($transaksi->jasa_pengirim=="Sicepat") selected @endif>Sicepat</option>
						<option value="Lainnya" @if($transaksi->jasa_pengirim=="Lainnya") selected @endif>lainn</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="status">Status :</label>
					<select class="form-control" name="status">
						<option value="Diterima di Pos" @if($transaksi->status=="Diterima di Pos") selected @endif>Diterima di Pos</option>
						<option value="Sudah Diterima Pemilik" @if($transaksi->status=="Sudah Diterima Pemilik") selected @endif>Sudah Diterima Pemilik</option>
						<option value="Barang di Resepsionis" @if($transaksi->status=="Barang di Resepsionis") selected @endif>Barang di Resepsionis</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4" style="margin-top:60px">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>
	</div>

@endsection