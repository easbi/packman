@extends('layout.main')
@section('content')

	<div class="container">
		<center><h2>Tambah Paket Baru</h2><br/></center>
		<form method="post" action="{{url('transaksis')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="nama_penerima">Nama Penerima:</label>
					<input type="text" class="form-control" name="nama_penerima">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="jenis_diklat">Jenis Diklat :</label>
					<input type="text" class="form-control" name="jenis_diklat">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="kategori">Kategori :</label>
					<select class="form-control" name="kategori">
						<option value="Makanan">Makanan</option>
						<option value="Dokumen">Dokumen</option>
						<option value="Elektronik">Elektronik</option>
						<option value="Pakaian">Pakaian</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="jasa_pengirim">Jasa Pengirim :</label>
					<select class="form-control" name="jasa_pengirim">
						<option value="TIKI">TIKI</option>
						<option value="JNE">JNE</option>
						<option value="J&amp;T">J&amp;T</option>
						<option value="Sicepat">Sicepat</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="status">Status :</label>
					<select class="form-control" name="status">
						<option value="Diterima di Pos">Diterima di Pos</option>
						<option value="Sudah Diterima Pemilik">Sudah Diterima Pemilik</option>
						<option value="Barang di Resepsionis">Barang di Resepsionis</option>
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

@endsection