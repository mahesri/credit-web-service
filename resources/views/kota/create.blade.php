@extends('adminlte::page')
@section('content')

<h4>Form Masukan Tabel Kota</h4>

<form action="{{ route('kota.store') }}" method="post">

{{ csrf_field() }}

<div class="form-group {{ $errors->has('nama_kota') ? 'has-error' : '' }}">

<label for="nama_kota" class="control-label">Nama kota</label>
<input type="text" class="form-control" name="nama_kota" placeholder="kota" autofocus id="nama_kota">

@if($errors->has('nama_kota'))

<span class="help-block">{{ $errors->first('nama_kota') }}</span>

@endif
</div>

<div class="form-group {{ $errors->has('nama_kota') ? 'has-error' : '' }}">

    <label for="id_propinsi" class="control-label">Propinsi</label>

    <select name="id_propinsi" class="form-control" id="">
        <option>-------Pilih propinsi------</option>
        @foreach ($propinsi as $prop)
        <option value="{{ $prop->id }}">{{ $prop->nama_propinsi }}</option>
        @endforeach
    </select>
    
    @if ($errors->has('id_propinsi'))
    <span class="help-block">{{ $errors->first('id_propinsi') }}</span>
    @endif

</div>    

<div class="form-group">
    <button type="submit"class="btn btn-info">Simpan</button>
    <a href="{{ route('propinsi.index',) }}" class="btn btn-default">Kembali</a>
</div>

</form>

@endsection