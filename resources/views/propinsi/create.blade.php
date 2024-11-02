@extends('adminlte::page')
@section('content')

<h4>Form Masukan Propinsi</h4>
<form action="{{ route('propinsi.store') }}" method="post">

    @if($message = Session::get('message'))
    <div class="alert alert-warning martop-sm">
        <p>{{$message}}</p>
    </div>
    @endif


    {{csrf_field()}}


    <div class="form-group {{ $errors->has('propinsi') ? 'has-error' : ''}}">

        <label for="propinsi">Propinsi</label>
        <input type="text" name="nama_propinsi" id="propinsi" placeholder="Propinsi" class="form-control" autofocus>

         @if ($errors->has('propinsi'))
        
         <span class="help-block">{{ $errors->first('propinsi') }}  
        </span>
        
        @endif

    </div>

<div class="form-group">
 <button type="submit" class="btn btn-info">Simpan</button>
    <a href="{{ route('propinsi.index') }}" class="btn btn-default">Kembali</a>
</div>




</form>
@endsection