<?php

namespace App\Imports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\ToModel;
//use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecordsImport implements ToModel//, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Record([
            'gestion' => $row[0], //Carbon::parse()->format('Y-m-01'),
            'fechahecho' => $row[1],
            'hora' => $row[2],
            'mesregistro' => $row[3],
            'departamento' => $row[4],
            'provincia' => $row[5],
            'municipio' => $row[6],
            'localidad' => $row[7],
            'zonabarrio' => $row[8],
            'lugarhecho' => $row[9],
            'gps' => $row[10],
            'unidad' => $row[11],
            'arrestado' => $row[12],
            'ci' => $row[13],
            'nacido' => $row[14],
            'nacionalidad' => $row[15],
            'edad' => $row[16],
            'genero' => $row[17],
            'temperancia' => $row[18],
            'causaarresto' => $row[19],
            'nathecho' => $row[20],
            'arma' => $row[21],
            'remitidoa' => $row[22],
            'nombres' => $row[23],
            'pertenencias' => $row[24],
        ]);
    }
}
