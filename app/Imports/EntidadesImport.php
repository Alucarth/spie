<?php

namespace App\Imports;

use App\Entidad;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Log;
class EntidadesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row['codigo']);
        $entidad = new Entidad;
        $entidad->codigo = trim($row['codigo']);
        $entidad->descripcion = trim($row['nombre']);
        $entidad->sigla = trim($row['sigla']);
        $entidad->clasificador = trim($row['clasificador']);
        $entidad->codigo_padre = trim($row['codigo_padre']);
        $entidad->user_id = 1;
        $entidad->save();
        // return new Entidad([
        //     //
        // ]);
    }
}
