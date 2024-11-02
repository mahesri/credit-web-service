@extends('default')
@section('content')

<h1>Hasil Perhitungan Segi Tiga</h1>

<table class="table table-striped table-bordered">
    <tr><td>Alas </td> <td>{{$segiTiga->alas }}</td></tr>
    <tr><td>Tinggi </td> <td>{{$segiTiga->tinggi }}</td></tr>
    <tr><td>Luas </td> <td>{{$segiTiga->luas() }}</td></tr>
    </table>
    @endsection