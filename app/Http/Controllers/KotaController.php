<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Propinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    
    public function index(){
        
    //   $kota = Kota::orderBy('id', 'DESC')->paginate(5);
        
        $kota = Kota::with('propinsi')->orderBy('id', 'DESC')->paginate(5);
        return view('kota.index', compact('kota'));

    }
    
    public function create(){
        
        $propinsi = Propinsi::all();

        return view('kota.create', compact('propinsi'));
    }

    public function store(Request $request) {
        
        // $kota = new Kota;
        $kota = new Kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_propinsi = $request->id_propinsi;
        $kota->save();
        
        return redirect()->route('kota.index')->with('message', 'Kota berhasil ditambahkan!');
    }

}

