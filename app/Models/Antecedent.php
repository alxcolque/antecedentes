<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;
    //relacion muchos a uno
    public function povince(){
        return $this->belongsTo(Province::class);
    }
    //relacion muchos a uno
    public function crime(){
        return $this->belongsTo(Crime::class);
    }
    //relacion muchos a uno
    public function detective(){
        return $this->belongsTo(Detective::class);
    }
    //relacion muchos a muchos
    public function people(){
        return $this->belongsToMany(Person::class);
    }
}
