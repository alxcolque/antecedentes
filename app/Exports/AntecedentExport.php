<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AntecedentExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        $type = DB::table('antecedents')
        ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
        ->join('people', 'antecedent_person.person_id', '=', 'people.id')
        ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
        ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
        ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
        ->join('departments', 'provinces.id', '=', 'departments.id')

        ->get(array(
            'antecedents.id',
            'arrestado',
            'ci',
            'nacido',
            'nacionalidad',
            'edad',
            'genero',
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
            'temperancia',
            'gps',
            'causaarresto',
            'nathecho',
            'unidad',
            'arma',
            'remitidoa',
            'pertenencias',
            'nombres',
        ));
        return $type ;
    }
     public function headings(): array
    {
        return [
            'ID',
            'ARRESTADO',
            'CI',
            'NACIDO',
            'NACIONALIDAD',
            'EDAD',
            'GENERO',
            'GESTION',
            'FECHAHECHO',
            'HORA',
            'MESREGISTRO',
            'DEPARTAMENTO',
            'PROVINCIA',
            'MUNICIPIO',
            'LOCALIDAD',
            'ZONABARRIO',
            'LUGARHECHO',
            'TEMPERANCIA',
            'GPS',
            'CAUSAARRESTO',
            'NATHECHO',
            'UNIDAD',
            'ARMA',
            'REMITIDOA',
            'PERTENENCIAS',
            'NOMBRES',

        ];
    }
}
