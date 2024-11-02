@extends('adminlte::page')
@section('content')

<h2>Tabel angsuran</h2>


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

<label for="no_pinjaamn">No Pinjaman</label> : {{$pinjaman->id_pinjaman}} <br>
<label for="nama">Nama</label> : {{$pinjaman->anggota->nama}} <br>
<label for="nominal">Nominal</label> : Rp. {{ number_format($pinjaman->besar_pinjaman, 0, ',', '.')}} <br>
<label for="jml_sdh_diangsur">Jumlah sudah diangsur</label> : Rp. {{ number_format($totalDiangsur, 0, ',', '.')}}<br>
<label for="diangsur">Diangsur</label> : {{$pinjaman->diangsur_kali}} kali <br>
<label for="jenis_pinjaman">Jenis Pinjaman</label> : {{ $pinjaman->jenisPinjam->jenis_pinjaman }}

<table class="table table-responsive martop-sm">
    <thead>
        <th>ANG KE</th>
        <th>BATAS PEMBAYARAN</th>
        <th>JUMLAH ANGSURAN</th>
        <th>JUMLAH BAYAR</th>
        <th>SETATUS</th>
        <th>AKSI</th>
        </thead>

        <tbody>

            @foreach($angsuran as $angsur)

            <tr>
                <td>{{$angsur->angsuran_ke}}</td>
                <td>{{$angsur->tanggal_jatuh_tempo}}</td>
                <td>{{number_format($angsur->besar_angsuran, 0, ',', '.')}}</td>
                <td>{{$angsur->tanggal_pembayaran}}</td>
                <td>{{$angsur->status == 1 ? "Bayar" : "Belum bayar"}}</td>

                <td> <a href="{{ route('pinjaman.transAngsuran', $angsur->id_angsuran) }}"
                    class="btn btn-warning btn-sm">Transaksi Angsuran </a> </td>
                
            @endforeach

        </tbody>
</table>    

@endsection

