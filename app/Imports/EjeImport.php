<?php

namespace App\Imports;

use App\Eje;
use App\Meta;
use App\Resultado;
use App\Accion;
use App\Indicador;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Log;
class EjeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row['codeje']);
        $eje = Eje::where('codigo','=', trim($row['codeje']))->first();
        if(!$eje)
        {
            $eje = new Eje;
            $eje->codigo = $row['codeje'];
            $eje->descripcion = $row['desc_eje'];
            $eje->save();
        }

        $cod = explode(".",trim($row['cod_meta']));
        if($eje->codigo === $cod[0])
        {
            $meta = Meta::where('descripcion','=',trim($row['desc_meta']))->first();
            if(!$meta)
            {
                $meta = new Meta;
                $meta->codigo = $cod[1];
                $meta->descripcion = $row['desc_meta'];
                $meta->eje_id = $eje->id;
                $meta->user_id = 1;
                $meta->save();
            }
        }

        $codres = explode(".",trim($row['cod_res']));

        if($meta->codigo == $codres[1])
        {
            $resultado = Resultado::where('descripcion','=',trim($row['desc_res']))->first();
            if(!$resultado)
            {
                $resultado= new Resultado;
                $resultado->codigo = $codres[2];
                $resultado->descripcion = $row['desc_res'];
                $resultado->meta_id = $meta->id;
                $resultado->user_id = 1;
                $resultado->save();
            }

        }
        $coda = explode(".",trim($row['cod_acc']));

        if($resultado->codigo == $coda[2])
        {
            $accion= Accion::where('descripcion','=',trim($row['desc_acc']))->first();
            if(!$accion)
            {
                $accion = new Accion;
                $accion->codigo = $coda[3];
                $accion->descripcion = $row['desc_acc'];
                $accion->resultado_id = $resultado->id;
                $accion->user_id = 1;
                $accion->save();

            }

        }

        // $codi = explode(".",trim($row['cod_acc']));
        // if($accion->codigo == $codi[3])
        // {
        //     $indicador = Indicador::where('descripcion','=',trim($row['indicador']))->first();
        //     if(!$indicador)
        //     {
        //         $indicador = new Indicador;
        //         $indicador->codigo = $codi[3];
        //         $indicador->descripcion = $row['indicador'];
        //         $indicador->linea_base_unidad = $row['linea_base'];
        //         $indicador->linea_base_valor = $row['linea_base'];
        //         $indicador->accion_id =$accion->id;
        //         $indicador->user_id = 1;
        //         $indicador->save();
        //     }
        // }



        // return new Eje([
        //     //
        // ]);
    }
}
