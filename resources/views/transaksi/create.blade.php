@extends('layout.main')
@section('content')

<div class="container">
	<center><h2>Tambah Paket Baru</h2><br/></center>
	<form method="post" action="{{url('transaksis')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="nama_penerima">Nama Penerima:</label>
			<input type="text" class="form-control" name="nama_penerima">
		</div>
		<div class="form-group">
			<label for="jenis_diklat">Kategori Penerima Paket :</label>
			<select class="form-control" name="jenis_diklat">
				<option value="2">Peserta Diklat</option>
				<option value="1">Pegawai</option>
			</select>
		</div>
		<div class="form-group">
			<label for="kategori">Kategori Paket:</label>
			<select class="form-control" name="kategori">
				<option value="" selected disabled>Pilih</option>
				<option value="1">Makanan</option>
				<option value="2">Dokumen</option>
				<option value="3">Elektronik</option>
				<option value="4">Pakaian</option>
				<option value="5">Lainnya</option>
			</select>
		</div>
		<div class="form-group">
			<label for="jasa_pengirim">Jasa Pengirim :</label>
			<select class="form-control" name="jasa_pengirim">
				<option value="" selected disabled>Pilih</option>
				<option value="1">TIKI</option>
				<option value="2">JNE</option>
				<option value="3">J&amp;T</option>
				<option value="4">Sicepat</option>
				<option value="5">POS</option>
				<option value="6">Lainnya</option>
			</select>
		</div>
		<div class="form-group">
			<label for="status">Status :</label>
			<select class="form-control" name="status">
				<option value="" selected disabled>Pilih</option>
				@foreach($nama_status as $key => $ns)
					<option value="{{$key}}">{{$ns}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="penerima">Penerima Paket di Pos:</label>
			<select class="form-control" name="penerima">
				<option value="" selected disabled>Pilih</option>
				<option value="Kadar Slamet ">Kadar Slamet </option>
				<option value="Junaedi">Junaedi </option>
				<option value="Supardi">Supardi</option>
				<option value="Nartim">Nartim</option>
				<option value="D. Moh Ikhsan">D. Moh Ikhsan </option>
				<option value="Eda">Eda</option>
				<option value="Windi">Windi</option>
				<option value="Dicky">Dicky</option>
				<option value="Eko S">Eko Saputro</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>

	@endsection