<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    //relacion muchos a muchos
    protected $fillable = [
        'arrestado',
        'ci',
        'nacido',
        'nacionalidad',
        'edad',
        'genero',
        'foto',
    ];
    public function antecedents()
    {
        return $this->belongsToMany(Antecedent::class, 'antecedent_person');
    }
}
