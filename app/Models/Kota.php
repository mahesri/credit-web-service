<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Menimpor class Propinsi
use App\Models\Propinsi;

class Kota extends Model
{
    use HasFactory;

    protected $table = "kota";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'id_propinsi', 'nama_kota'];

    // method untuk mengambil id dari class propinsi

    public function propinsi()
    {
        return $this->belongsTo(Propinsi::class, 'id_propinsi');
        // memanggil properti id_propinsi dari class propinsi

        // method belongsTo merepresentasikan relasi one to many yang mana
        // ini berarti class kota adalah miliki class propinsi   
    }

}
