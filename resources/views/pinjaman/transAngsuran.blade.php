@extends('adminlte::page')

@section('content')


    <h2>Form Transaksi Angsuran</h2>

    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <form action="{{ route('pinjaman.storeAngsuran', $angsuran->id_angsuran) }}" method="POST">
       
        {{ csrf_field() }}
        {{method_field('PUT')}}
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $angsuran->anggota->nama }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="besar_angsuran">Besar Angsuran (Rp)</label>
            <input type="number" class="form-control" id="besar_angsuran" name="besar_angsuran" value="{{number_format($angsuran->besar_angsuran,  0, ',', '.')}}" readonly>
        </div>

        <div class="form-group">
            <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{$angsuran->tanggal_jatuh_tempo}}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="">--pilihan--</option>
                <option value="belum_bayar">Belum Bayar</option>
                <option value="sudah_bayar">Sudah Bayar</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success" >Simpan</button>
    </form>


@endsection
