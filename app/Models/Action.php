<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    //Relacion polimófica
    public function usuario()//mismo nombre que el campo
    {
        return $this->morphTo();
    }
}
