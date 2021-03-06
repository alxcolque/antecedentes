<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;

    protected $fillable = [
        'gestion',
        'fechahecho',
        'hora',
        'mesregistro',
        'departamento',
        'provincia',
        'municipio',
        'localidad',
        'zonabarrio',
        'lugarhecho',
        'gps',
        'unidad',
        'temperancia',
        'causaarresto',
        'nathecho',
        'arma',
        'remitidoa',
        'nombres',
        'pertenencias',
    ];
    //relacion muchos a uno
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    //relacion muchos a uno
    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
    //relacion muchos a uno
    public function detective()
    {
        return $this->belongsTo(Detective::class);
    }
    //relacion muchos a uno
    public function import()
    {
        return $this->belongsTo(Import::class);
    }
    //relacion muchos a muchos
    public function people()
    {
        return $this->belongsToMany(Person::class, 'antecedent_person');
    }
}
