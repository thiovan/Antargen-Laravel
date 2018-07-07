@extends('adminlte::page')

@section('title', 'AntarGEN')

@section('content_header')
    <h2><i class="fa fa-user"></i> Manage Product
    <a href="{{ url('masterproduk/create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Product</a></h2>
@stop

@section('content')
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $pesan)
      @if(Session::has('alert-' . $pesan))
        <p class="alert alert-{{ $pesan }}">
          {{ Session::get('alert-' . $pesan) }}
        <a href="#" class="close" data-dismiss="alert"  aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
  <div class="table-responsive">
      <table id="table_id" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach ($produks as $produk)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->kategori }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->harga }}</td>
            <td>
              <!-- <img src="{{ asset('/storage/app/images/produk/') }}/{{ $produk->foto }}" width="200px" heigth="75px" alt=""> -->
              <img src="http://antargen.ktpsapi.com/storage/app/images/produk/{{ $produk->foto }}" width="200px" heigth="75px" alt="">
            </td>
            <td>
                <form class="" action="{{ url('masterproduk') }}/{{ $produk->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{method_field('DELETE')}}
                <a href="{{ url('masterproduk') }}/{{ $produk->id }}/edit" class="btn btn-warning"><span class="fa fa-pencil" aria-hidden="true"></span> Edit</a>  
                <button class="btn btn-danger" onclick="var x = confirm('Yakin akan menghapus data ini ?');
                if(x){return true;} else {return false;}">
                <span class="fa fa-trash" aria-hidden="true"></span> Hapus</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>

@stop

@push('js')
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endpush