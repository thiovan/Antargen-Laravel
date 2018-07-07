@extends('adminlte::page')

@section('title', 'AntarGEN')

@section('content_header')
    <h1>Edit User : {{ $user->name }}</h1><br>
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
	<div class="panel-heading">Edit User</div>
        <div class="panel-body">
        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('masteruser') }}/{{ $user->id }}">
        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
            <label for="name" class="col-md-1 control-label">Name</label>
            <div class="col-md-4">
            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-1 control-label">Email</label>
            <div class="col-md-4">
            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" class="col-md-1 control-label">Status</label>
            <div class="col-md-4">
            <select class="form-control" id="status" class="form-control" name="status">
                <option value="">Pilih ..</option>
                <option>Admin Toko</option>
                <option>Admin Transaksi</option>
                <option>Manajer</option>
                <option>Kurir</option>
                <option>Pelanggan</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
 	        </div>
        </div>
        <br>
        <h4>Change Password (Optional) :</h4>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-1 control-label">New Password</label>
                <div class="col-md-4">
                <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-1 control-label">Confirm New Password</label>
                <div class="col-md-4">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">
            <span class="fa fa-pencil" aria-hidden="true"></span>
              Save
            </button>
            <a href="{{ url('/masteruser') }}" type="button" class="btn btn-danger"><span class="fa fa-close" aria-hidden="true"></span> Cancel</a>
            </form>
        </div>
    </div>

@endsection