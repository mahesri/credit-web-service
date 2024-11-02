<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propinsi;

class PropinsiController extends Controller
{
    //

    public function belajar(){

        // return View::make('belajar.tampilanView');
    }

    public function index()
    {

        $propinsi = Propinsi::orderBy('id', 'DESC')->paginate(5);
        return view('propinsi.index', compact('propinsi'));

    }

    public function store(Request $request)
    {

    // $this->validate($request, [
    //     'nama_propinsi' => 'required',
    // ]);

    $propinsi = new Propinsi;
    $propinsi->nama_propinsi = $request->nama_propinsi;
    $propinsi->save();

    if( $propinsi->save()){
    
    return redirect()->route('propinsi.index')->with('message', "Propinsi berhasil ditambahkan");
    
    } else {
    
        return redirect()->route('propinsi.create')->with('message', "Propinsi gagal ditambahkan!"); 
    } 

    }

    public function show($id)
    {

        $propinsi = Propinsi::findOrFail($id);

        return view('propinsi.show', compact('propinsi')); // propinsi.edit adalah representas

    }

    public function edit($id)
    {

        $propinsi = Propinsi::findOrFail($id);

        return view('propinsi.edit', compact('propinsi')); // propinsi.edit adalah representasi view yang akan kita buat || 
    }

    public function update(Request $request ,$id)
    {

        $this->validate($request, 
        [
        'nama_propinsi' => 'required',
        ]);
        if($propinsi = Propinsi::findOrFail($id)->update($request->all())){
        
        return redirect()->route('propinsi.index')->with('message', "Propinsi berhasil dirubah!");
        
        }else{
        
            return redirect()->route('propinsi.index')->with('message', "Data gagal diubah lek!");
        }

    }

    public function create() {
    
        
        return View('propinsi.create');
    }

    public function destroy($id)
    {
        $model = Propinsi::find($id);
        $model->delete();

        return redirect()->route('propinsi.index')->with('message', 'Propinsi berhasil dihapus!');
    }

}
