<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    //relacion muchos a uno
    public function user(){
        return $this->belongsTo(User::class);
    }
    //relacion muchos a uno
    public function antecedent(){
        return $this->belongsTo(Antecedent::class);
    }
}
