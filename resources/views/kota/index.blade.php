@extends('adminlte::page')
@section('content')

<h4>Table Manajemen Kota</h4>

<a href="{{ route('kota.create')}}" target="_blank" rel="noopener noreferrer" 
class="btn btn-info btn-sm">Tambahkan kota baru</a>

@if($message = Session::get('message'))

    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>

    @endif

    <table class="table tabble-responsive martop-sm">
        <thead>
            <thead>
                <th>ID</th>
                <th>PROPINSI</th>
                <th>KOTA</th>
                <th>ACTION</th>
            </thead>

    <tbody>
    @foreach($kota as $k)
    
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->propinsi->nama_propinsi }}</td>
            <td>  <a href="{{ route('kota.show', $k->id )}}"> {{ $k->nama_kota }}</a></td>
            <td>
            
                <form action="{{ route('kota.destroy', $k->id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
    
                  
                    <a href="{{ route('kota.edit', $k->id) }}"
                    class="btn btn-warning btn-sm">Ubah</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    
                    </form>
                

            </td>
        </tr>

    @endforeach
    
    </tbody>        

    </table>
    
    {{$kota->links('pagination::bootstrap-4')}}
    @endsection