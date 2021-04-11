<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;
    protected $fillable =['causaarresto'];
    //relacion uno a muchos 
    public function antecedents(){
        return $this->hasMany(Antecedent::class);
    }
}
