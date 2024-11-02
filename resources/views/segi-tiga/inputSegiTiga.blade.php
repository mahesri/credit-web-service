@extends('default')
@section('content')

<h4>Input Masukan Segi Tiga</h4>

<form action="{{ route('segi-tiga.hasil') }}" method="get">

{{csrf_field()}}
@if  ($errors->any())


<div class="alert alert-danger">

    <strong>Ada kesalahan</strong> Harap diperbaiki.<br>
    
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

<div class="form-group {{ $errors->has('alas') ? 'has-error' : ''}}">
<label for="alas" class="control-label">Alas</label>
<input type="text" class="form-control" name="alas" autofocus>
</div>

<div class="form-group {{ $errors->has('tinggi') ? 'has-error' : ''}}">
<label for="tinggi" class="control-label">Tinggi</label>
<input type="text" class="form-control" name="tinggi" autofocus>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-info">Proses</button>
</div>
</div>

</form>

@endsection