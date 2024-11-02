@extends('adminlte::page')
@section('content')

<a href="{{ route('propinsi.edit', $propinsi->id) }}"
    class="btn btn-warning btn-sm">Ubah Propinsi</a>

    <table class="table table-responsive">

        <tr>
            <td>ID</td> <td> {{$propinsi->id}} </td>
        </tr>

        <tr>
            <td>Propinsi</td> <td>{{ $propinsi->nama_propinsi }}</td>
        </tr>

    </table>

    @endsection