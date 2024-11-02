@extends('adminlte::page');
@section('content')

<div class="container">
<h1>Tabel Pinjaman</h1>


@if($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{$message}}</p>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

<a href=" {{ route('pinjaman.create')}}" class="btn btn-info btn-sm">Transaksi Pinjam</a>

<table class="table table-responsive martop-sm">
    <thead>
        <th>ID</th>
        <th>NAMA ANGGOTA</th>
        <th>JENIS PENJAMAN</th>
        <th>JUMLAH PINJAMAN</th>
        <th>JML ANGSURAN</th>
        <th>PER ANGSURAN</th>
        <th>STATUS</th>
        <th>AKSI</th>
    </thead>

    <tbody>
        @foreach($pinjaman as $p)
        
            <tr> 
                <td>{{ $p->id_pinjaman}}</td>
                <td>{{ $p->anggota->nama}}</td>
                <td>{{ $p->jenisPinjam->jenis_pinjaman}}</td>
                <td align="right">{{ number_format($p->besar_pinjaman, 0, ',', '.')}}</td>
                <td align="right">{{ $p->diangsur_kali}}</td>
                <td align="right">{{ number_format($p->besar_pokok_pinjaman, 0, ',', '.')}}</td>
                <td>{{ $p->status==0 ? "Belum Lunas":"Lunas"}}</td>
               
                <td> <a href="{{ route('pinjaman.angsuran', $p->id_pinjaman) }}"
                class="btn btn-warning btn-sm">Transaksi Angsuran </a> </td>
                
            </tr>
        
        @endforeach
    </tbody>

</table>
 
</div>
@endsection