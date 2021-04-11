<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detective extends Model
{
    use HasFactory;
    protected $fillable =['nombres'];
    //relacion uno a muchos  
    public function antecedents(){
        return $this->hasMany(Antecedent::class);
    }
}
