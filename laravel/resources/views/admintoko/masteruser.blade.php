@extends('adminlte::page')

@section('title', 'AntarGEN')

@section('content_header')
    <h1><i class="fa fa-user"> Manage User Page</i></h1><br>
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

      <a href="{{ url('masteruser/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah User</a>
      <br>
      <br>
        <div class="table-responsive">
          <table id="table_id" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($users as $user)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$user-> name}}</td>
                <td>{{$user-> email}}</td>
                @if ( $user->admintoko == 1)
                    <td>Admin Toko</td>
                @elseif ( $user->admintransaksi == 1)
                    <td>Admin Transaksi</td>
                @elseif ( $user->manajer == 1)
                    <td>Manajer</td>
                @elseif ( $user->kurir == 1)
                    <td>Kurir</td>
                @else
                    <td>Pelanggan</td>
                @endif
                <td>
                <form class="" action="{{ url('masteruser') }}/{{ $user->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{method_field('DELETE')}}
                <a href="{{ url('masteruser') }}/{{ $user->id }}/edit" class="btn btn-warning"><span class="fa fa-pencil" aria-hidden="true"></span> Edit</a>  
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