<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    //protected $fillable =['municipio',	'province_id'	];
    //relacion uno a muchos  
    public function antecedents(){
        return $this->hasMany(Antecedent::class);
    }
    //relacion muchos a uno
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
