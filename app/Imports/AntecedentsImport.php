<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Province;
use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Http\Controllers\Admin\AntecedenteController;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AntecedentsImport implements ToModel//, WithHeadingRow
{
    public function model(array $row)
    {
        /*$objeto = new AntecedenteController();
        return new Department([
            'municipio'     => $row[6],
            'province_id'     => $objeto->idgetProvinceID(
                $row[4],$row[5]),
        ]);*/
    }
    
}
