<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SegiTiga extends Model
{
    use HasFactory;

    public $alas;
    public $tinggi;

    public function Luas()
    {
        return 0.5 *($this->alas * $this->tinggi);
    }
}
