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
				<input type="text" class="form-control" name="nama_penerima" value="{{ $transaksi->nama_penerima }}">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label for="jenis_diklat">Jenis Diklat :</label>
				<select class="form-control" name="jenis_diklat">
					@foreach($jenis_penerima as $jenis_penerima)
						<option value={{$jenis_penerima->id }} {{$transaksi->jenis_diklat == $jenis_penerima->id ? 'selected="selected"' : ''}}>{{$jenis_penerima->jenis_penerima}}</option>						
					@endforeach
			</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label for="kategori">Kategori :</label>
				<select class="form-control" name="kategori">
					@foreach($kategori as $kt)
						<option value={{ $kt->id }}  @if($transaksi->kategori==$kt->id) selected @endif>{{ $kt->nama_kategori }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label for="jasa_pengirim">Jasa Pengirim :</label>
				<select class="form-control" name="jasa_pengirim">
					@foreach($jasa_pengirim as $jp)
						<option value={{ $jp->id }} @if($transaksi->jasa_pengirim==$jp->id) selected @endif>{{ $jp->nama_jasa_pengirim }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label for="status">Status : </label>
				<select class="form-control" name="status">
					@foreach($status as $st)
						<option value={{$st->id}} @if($transaksi->status==$st->id) selected @endif>{{$st->nama_status}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label for="penerima">Penerima Paket di POS :</label>
				<select class="form-control" name="penerima">
					@foreach($nama_petugas as $np)
						<option value={{$np->id}} @if($transaksi->petugas==$np->id) selected @endif>{{$np->nama_petugas}}</option>
					@endforeach
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