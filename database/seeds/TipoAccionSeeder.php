<?php

use Illuminate\Database\Seeder;
use App\TipoAccion;
class TipoAccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos_de_accion = [
            ["tipo"=> "PDES"],
            ["tipo"=> "SECTORIAL"],
            ["tipo"=> "MINISTERIAL"]
        ];

        foreach($tipos_de_accion as $tipo){
            TipoAccion::create($tipo);
        }
    }
}
