@extends('adminlte::page')
@section('content')

<h1>Form Pengajuan Pinjaman</h1>

<form action="{{ route( 'pinjaman.store' ) }}" method="POST">

    {{ csrf_field() }}

    {{-- Nama anggota --}}
    
    <div class="form-group {{ $errors->has('nama_anggota') ? 'has-error' : ''}}">

        <label for="nama_anggota" class="control-label">Nama anggota</label>
        <select name="nama_anggota" class="form-control" id="">
            <option>---Pilih anggota---</option>

            @foreach ($anggota as $anggota)
                
            <option value="{{$anggota->id_anggota }}">{{$anggota->nama}}</option>
            @endforeach

        </select>

    @if($errors->has('nama_anggota'))
    
    <span class="help-block">{{ $errors->first('nama_anggota') }}</span>
    
    @endif
    </div>          

    {{-- Nama Anggota done --}}

    {{-- Besar pinjaman --}}
    <div class="form-group {{ $errors->has('besar_pinjaman') ? 'has-error' : ''}}">

        <label for="besar_pinjaman" class="control-label">Besar pinjaman (Rp)</label>
        <input type="text" name="besar_pinjaman" class="form-control">

    @if($errors->has('besar_pinjaman'))
    
    <span class="help-block">{{ $errors->first('besar_pinjaman') }}</span>
    
    @endif
    </div>

    {{-- Besar pinjaman done --}}

    {{-- Jumlah angsuran --}}

    <div class="form-group {{ $errors->has('jumlah_angsuran') ? 'has-error' : ''}}">

        <label for="jumlah_angsuran" class="control-label">Jumah angsuran</label>
        <input type="text" name="jumlah_angsuran" class="form-control" id="jumlah_angsuran">

    @if($errors->has('jumlah_angsuran'))
    
    <span class="help-block">{{ $errors->first('jumlah_angsuran') }}</span>
    
    @endif
    </div>

    {{-- Jumlah angsuran done --}}

    {{-- Jenis Pinjaman --}}

    <div class="form-group {{ $errors->has('jenis_pinjaman') ? 'has-error' : ''}}">

        <label for="jenis_pinjaman" class="control-label">Jenis Pinjaman</label>
    
        <select name="jenis_pinjaman" class="form-control" id="">
            <option value="">---Jenis pinjaman---</option>

            @foreach ($jenisPinjaman as $jp)

            <option value="{{$jp->id_jenis}}" id="optioner">{{$jp->jenis_pinjaman }}</option>
                
            @endforeach
        </select>


    @if($errors->has('jenis_pinjaman'))
    
    <span class="help-block">{{ $errors->first('jenis_pinjaman') }}</span>
    
    @endif
    </div>

    {{-- Jenis Pinjaman done --}}

    {{-- Besar pokok angsuran --}}

    <div class="form-group {{ $errors->has('bpp') ? 'has-error' : ''}}">

        <label for="bpp" class="control-label">Besar pokok pinjaman (Rp)</label>
        <input type="text" name="bpp" class="form-control">

    @if($errors->has('bpp'))
    
    <span class="help-block">{{ $errors->first('bpp') }}</span>
    
    @endif
    </div>

    {{-- Besar pokok angsuran done --}}

    {{-- Besar angsuran --}}

    <div class="form-group {{ $errors->has('besar_angsuran') ? 'has-error' : ''}}">

        <label for="besar_angsuran" class="control-label">Besar angsuran (Rp)</label>
        <input type="text" name="bpp" class="form-control">

    @if($errors->has('besar_angsuran'))
    
    <span class="help-block">{{ $errors->first('besar_angsuran') }}</span>
    
    @endif
    </div>

    {{-- Besar angsuran done --}}

    {{-- tanggal pengajuan --}}

    <div class="form-group {{ $errors->has('tl_pengajuan') ? 'has-error' : ''}}">

        <label for="tl_pengajuan" class="control-label">Tangal pengajuan</label>
        <input type="date" name="tl_pengajuan" class="form-control">

    @if($errors->has('tl_pengajuan'))
    
    <span class="help-block">{{ $errors->first('tl_pengajuan') }}</span>
    
    @endif
    </div>

        {{-- tanggal pengajuan done --}}

        {{-- Tanggal acc --}}


    <div class="form-group {{ $errors->has('tl_acc') ? 'has-error' : ''}}">

        <label for="tl_acc" class="control-label">Tangal ACC</label>
        <input type="date" name="tl_acc" class="form-control">

    @if($errors->has('tl_acc'))
    
    <span class="help-block">{{ $errors->first('tl_acc') }}</span>
    
    @endif
    </div>

            {{-- Tanggal acc done --}}

            {{-- Tanggal perlunasan --}}


    <div class="form-group {{ $errors->has('tl_pl') ? 'has-error' : ''}}">

        <label for="tl_pl" class="control-label">Tangal perlunasan</label>
        <input type="date" name="tl_pl" class="form-control">

    @if($errors->has('tl_pl'))
    
    <span class="help-block">{{ $errors->first('tl_pl') }}</span>
    
    @endif
    </div>

                {{-- Tanggal perlunasan done --}}

                {{-- Tanggal jatuh tempo --}}


    <div class="form-group {{ $errors->has('tl_jt') ? 'has-error' : ''}}">

        <label for="tl_jt" class="control-label">Tangal jatuh tempo</label>
        <input type="date" name="tl_jt" class="form-control">

    @if($errors->has('tl_jt'))
    
    <span class="help-block">{{ $errors->first('tl_jt') }}</span>
    
    @endif
    </div>

    {{-- Tanggal jatuh tempo done --}}

    <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">

        <label for="keterangan" class="control-label">Keterangan</label>
        <textarea name="keterangan" placeholder="keterangan" class="form-control"></textarea>

    @if($errors->has('keterangan'))
    
    <span class="help-block">{{ $errors->first('keterangan') }}</span>
    
    @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">Kirim >></button>
        <a href="{{ route('pinjaman.index',) }}" class="btn btn-default">Kembali</a>

    </div>
</form>

<script src=" {{ asset('../js/pinjamanAjax.js') }}" defer></script>
@vite('resources/js/pinjamanAjax.js')
@endsection


{{-- 
@section('scripts')
    <!-- Include the AJAX script for the form submission -->
    <script src="{{ asset('../js/pinjamanAjax.js') }}" defer></script>
@endsection --}}