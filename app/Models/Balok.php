<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balok extends \App\Models\SegiEmpat
{ 
    use HasFactory;

    public $tebal;

    public function volume()
    {
    return $this->panjang * $this->lebar * $this->tebal;
    }

}
