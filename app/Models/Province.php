<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    //relacion uno a muchos  
    public function antecedents(){
        return $this->hasMany(Antecedent::class);
    }
    //relacion muchos a uno
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
