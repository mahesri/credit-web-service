<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegiEmpat;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class SegiEmpatController extends Controller
{
    //
    public function InputSegiEmpat()
    {
        return View::make('segi-empat.inputSegiEmpat');
    }

    // method memanggil form masukan

    public function inputBalok()
    {
        return View::make('segi-empat.inputBalok');
    }


    public function hasil(Request $request)
    {
        $segiEmpat = new SegiEmpat;

        // aturan validasi
        $rules = [
            'panjang'=>'required|numeric',
            'lebar'=>'required|numeric'
        ];

        $validator = Validator::make( $request->all(), $rules);

        // cek validasi
        if($validator->fails()){
            
            // Jika salah kembalikan ke form untuk diperbaiki
         return View::make('segi-empat.inputSegiEmpat', 
         compact('segiEmpat'))->withErrors($validator);
        //  return redirect()->back()->withErrors($validator)->withInput();

        }else{
            
            // Melanjutkan untuk menampilkan hasil
            $segiEmpat->panjang=$request->panjang;
            $segiEmpat->lebar=$request->lebar;
            return View::make('segi-empat.hasil', compact('segiEmpat'));
        }
    }

    // method inputBalok
    public function hasilBalok(Request $request){

        $balok = new \App\Models\Balok;

        $rules = [
            'panjang'=>'required|numeric',
            'lebar'=>'required|numeric',
            'tebal'=>'required|numeric'
        ];

        // untuk memvalidasi setiap masukan yang diisikan oleh user
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return View::make('segi-empat.inputBalok', compact('balok'))->withErrors($validator);
        }else{
            $balok->panjang = $request->panjang;
            $balok->lebar = $request->lebar;
            $balok->tebal = $request->tebal;

            return View::make('segi-empat.hasilBalok', compact('balok'));
        }

    }

}
