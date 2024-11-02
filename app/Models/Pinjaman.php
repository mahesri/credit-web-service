<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    protected $fillable = ['id_anggota',
                           'id_jenis_pinjaman',
                           'besar_pinjaman',
                           'diangsur_kali',
                           'besar_pokok_pinjaman',
                           'besar_angsuran',
                           'tanggal_pengajuan',
                           'tanggal_acc',
                           'tanggal_perlunasan',
                           'status',
                           'tanggal_jatuh_tempo',
                           'keterangan',
];

public function anggota()
{

return $this->belongsTo(Anggota::class, 'id_anggota');

}

public function jenisPinjam()
{

return $this->belongsTo(JenisPinjaman::class, 'id_jenis_pinjaman');

}


}
