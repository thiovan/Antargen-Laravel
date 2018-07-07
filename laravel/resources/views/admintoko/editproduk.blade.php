@extends('adminlte::page')

@section('title', 'AntarGEN')

@section('content_header')
    <h1>Edit Produk</h1><br>
@stop

@section('content')

@if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

<div class="panel panel-primary">
    <div class="panel-heading">Edit Produk</div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('masterproduk') }}/{{ $produk->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}
        	<div class="form-group{{ $errors->has('nama_produk') ? ' has-error' : '' }}">
            	<label for="nama_produk" class="col-md-1 control-label">Nama Produk</label>
            	<div class="col-md-4">
                <input id="nama_produk" type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk') }}">
                    @if ($errors->has('nama_produk'))
                        <span class="help-block">
                        <strong>{{ $errors->first('nama_produk') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                <label for="kategori" class="col-md-1 control-label">Kategori</label>
                <div class="col-md-4">
                <select class="form-control" id="kategori" class="form-control" name="status">
                    <option value="">Pilih ..</option>
                    <option>Makanan</option>
                    <option>Minuman</option>
                    <option>Kesehatan</option>
                    <option>Kebutuhan Rumah Tangga</option>
                </select>
                @if ($errors->has('kategori'))
                    <span class="help-block">
                    <strong>{{ $errors->first('kategori') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                <label for="stok" class="col-md-1 control-label">Stok</label>
                <div class="col-md-4">
                <input id="stok" type="stok" class="form-control" name="stok" value="{{ old('stok') }}">
                    @if ($errors->has('stok'))
                        <span class="help-block">
                        <strong>{{ $errors->first('stok') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
        		<label for="harga" class="col-md-1 control-label">Harga</label>
	          		<div class="col-md-6">
	          		<div class="col-md-6 input-group">
	          		<div class="input-group-addon">Rp</div>
	          		<input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
          			</div>
		          	@if ($errors->has('harga'))
		            	<span class="help-block">
		              		<strong>{{ $errors->first('harga') }}</strong>
		            	</span>
		          	@endif
	          		</div>
      		</div>
		        <label>Select Image to Upload :</label>
		        <input type="file" name="foto" id="foto">
		        <br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">
                <span class="fa fa-pencil" aria-hidden="true"></span>
                    Create
                </button>
                <a href="{{ url('/masterproduk') }}" type="button" class="btn btn-danger"><span class="fa fa-close" aria-hidden="true"></span> Cancel</a>       
         </form>
    </div>
</div>
@endsection 