<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPinjaman;
use App\Models\Anggota;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Carbon\Carbon;
use  Illuminate\Support\Facades\DB;


class PinjamanController extends Controller
{
    public function index() {


        $pinjaman = Pinjaman::all();
        return view('pinjaman.index', compact('pinjaman'));
    }

    public function create(){

        // Mengambil data di table anggota dan jenis_pinjaman dengan eloquent

        $anggota = Anggota::all();
        $jenisPinjaman = JenisPinjaman::all();

        return view('pinjaman.create', compact('anggota', 'jenisPinjaman'));
    }

    public function store(Request $request)
    {

        // validasi input

        $request->validate([
        'id_anggota'=> 'required|exists:anggota, id_anggota',
        'id_jenis_pinjaman' => 'required|exists:jenis_pinjaman, id_jenis_pinjaman',
        'besar_pinjaman' => 'required|integer|min:1',
        'diangsur_kali' => 'required|integer|min:1',
        'besar_angsuran' => 'required|integer|min:1',
        'tanggal_jatuh_tempo' => 'required|date',
        ]);

        // instansiasi onjek pinjaman

        $pinjaman = new Pinjaman;
        $pinjaman->id_anggota = $request->nama_anggota;
        $pinjaman->id_jenis_pinjaman = $request->jenis_pinjaman;
        $pinjaman->besar_pinjaman = $request->besar_pinjaman;
        $pinjaman->diangsur_kali = $request->jumlah_angsuran;

        // Menentukan besar pokok pinjaman dan besar angsuran

        if($request->jumlah_angsuran <= 12){
        
            $persen = (5/ 100) * $request->besar_pinjaman;

            $bpk = ($persen + $request->besar_pinjaman) / $request->jumlah_angsuran;
            $besarAngsuran = $persen + $request->besar_pinjaman;
        
        }elseif($request->jumlah_angsuran <= 24){
        
            $persen = (10/ 100) * $request->besar->pinjaman;

            $bpk = ($persen + $request->besar_pinjaman) / $request->jumlah_angsuran;
            $besarAngsuran = $persen + $request->besar_pinjaman;

        
        }else{
            
            $persen = (8 / 100) * $request->besar->pinjaman;

            $bpk = ($persen + $request->besar_pinjaman) / $request->jumlah_angsuran;
            $besarAngsuran = $persen + $request->besar_pinjaman;

        }

        $pinjaman->besar_pokok_pinjaman = $bpk;
        $pinjaman->besar_angsuran = $besarAngsuran;
        $pinjaman->tanggal_pengajuan = $request->tl_pengajuan;
        $pinjaman->tanggal_acc = $request->tl_acc;
        $pinjaman->tanggal_perlunasan = $request->tl_pl;
        $pinjaman->tanggal_jatuh_tempo = $request->tl_jt;
        $pinjaman->keterangan = $request->keterangan;
        $pinjaman->save();

        // Tentukan jatuh tempo 
        $tanggalJatuhTempo = Carbon::parse($request->tl_jt);

        // Entri tabel angsuran

        for($i = 1; $i <= $request->diangsur_kali; $i++){

            $angsuran = new Angsuran();
            $angsuran->id_pinjaman = $request->id_pinjaman;
            $angsuran->id_anggota = $request->nama_anggota;
            $angsuran->tanggal_pembayaran = $tanggalJatuhTempo;
            $angsuran->tanggal_jatuh_tempo = $tanggalJatuhTempo;
            $angsuran->angsuran_ke = $i;
            $angsuran->besar_angsuran = $bpk;
            $angsuran->status = 0;
            $angsuran->save();

            // tambahkan 1 bulan berikutnya untuk setiap iterasi berikutnya

            $tanggalJatuhTempo->addMonth();

        }
        
        return redirect()->route('pinjaman.index')->with('message', 'Pinjaman berhasil ditambahkan!');
    }

    public function angsuran($id){

        $pinjaman = Pinjaman::findOrFail($id);
        
        $angsuran = Angsuran::where('id_pinjaman', $id)->paginate(5);        
        // Ambil jumlah angsuran yang sudah dibayar berdasarkan id_pinjaman dan status == 1;

        $jumlahDiangsur = Angsuran::where('id_pinjaman', $id)
                                    ->where('status', 1)
                                    ->count();

        // Hitung total besar angsuran yang sudah dibayar
        
        $totalDiangsur = Angsuran::where('id_pinjaman', $id)
                                   ->where('status', 1)
                                    ->sum('besar_angsuran');
        
        return view('pinjaman.angsuran', compact('pinjaman', 'angsuran', 'jumlahDiangsur', 'totalDiangsur'));
    }

    public function transAngsuran($id){
        $pinjaman = Pinjaman::all();
        $anggota = Anggota::all();
        $angsuran = Angsuran::with('anggota')->findOrFail($id);


        return view('pinjaman.transAngsuran', compact('angsuran', 'pinjaman'));
    }

    public function storeAngsuran(Request $request, $id){

        // debuging untuk mengetahui hasil pilihan dari form sudah sampai di fungsi storeAngsuran atau belum

        // dd($request->status);

        $request->validate(['status' => 'required|in:sudah_bayar, belum_bayar',]);

        $angsuran = Angsuran::findOrFail($id);


        if ($request->status === 'sudah_bayar') {
            $angsuran->status = 1;
        } elseif ($request->status === 'belum_bayar') {
            $angsuran->status = 0;
        }else {
            return back()->with('error', 'Masukan tidak valid');
        }
        $angsuran->timestamps = false;
        $angsuran->save();
        

        return redirect()->route('pinjaman.angsuran', $angsuran->id_pinjaman)->with('message', 'Angsuran berhasil diperbarui!');

    }
}