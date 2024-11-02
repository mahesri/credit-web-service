<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Limas extends \App\Models\SegiTiga
{
    use HasFactory;

    public function Volume()
    {
        return (1/3) * ($this->alas * $this->tinggi);
    }
}
