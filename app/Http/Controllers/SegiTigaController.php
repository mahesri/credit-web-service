<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegiTiga;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class SegiTigaController extends Controller
{
    




public function InputSegiTiga()
{
    return View::make('segi-tiga.inputSegiTiga');
}

// Method untuk membuat view masukan limas
public function inputLimas()
    {
        return View::make('segi-tiga.inputLimas');
    }

public function hasil(Request $request)
{

// instansiasi klass segitiga
$segiTiga = new SegiTiga;

// Aturan validasi

$rules = [
    'alas'=>'required|numeric',
    'tinggi'=>'required|numeric'
];

$validator = Validator::make($request->all(), $rules);

// Cek validasi inputan user
if($validator->fails()){
return View::make('segi-tiga.inputSegiTiga', 
compact('segiTiga'))->withErrors($validator);

}else{
    $segiTiga->alas = $request->alas;
    $segiTiga->tinggi = $request->tinggi;
    return View::make('segi-tiga.hasil', 
    compact('segiTiga'));
}

}

public function HasilLimas( Request $request){

$limas = new \App\Models\Limas;

$rules = [
    'alas'=>'required|numeric',
    'tinggi'=>'required|numeric'
];

$validator = Validator::make($request->all(), $rules);

if($validator->fails())
{
    return View::make('segi-tiga.inputLimas', 
    compact('limas'))->withErrors($validator);
}else{

    $limas->alas = $request->alas;
    $limas->tinggi = $request->tinggi;

    return View::make('segi-tiga.hasilLimas',
    compact('limas'));
}


}

}
