<?php

use Illuminate\Database\Seeder;
use App\Sector;
class SectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sectores = [
            ["nombre"=>"DEFENSA"],
            ["nombre"=>"TURÍSTICO"],
            ["nombre"=>"INDUSTRIAL"],
            ["nombre"=>"CULTURAL"],
            ["nombre"=>"EDUCACIÓN"],
            ["nombre"=>"SALUD"],
            ["nombre"=>"HÁBITAT Y VIVIENDA"],
            ["nombre"=>"COMERCIO"],
            ["nombre"=>"ENERGÍA"],
            ["nombre"=>"JUSTICIA"],
            ["nombre"=>"RECURSOS HÍDRICOS"],
            ["nombre"=>"SANEAMIENTO BÁSICO"],
            ["nombre"=>"TRANSPORTES"],
            ["nombre"=>"MINERO"],
            ["nombre"=>"MEDIO AMBIENTE"],
            ["nombre"=>"TELECOMUNICACIONES Y TECNOLOGÍAS DE INFORMACIÓN Y COMUNICACIÓN"],
            ["nombre"=>"HIDROCARBUROS"],
            ["nombre"=>"AGROPECUARIO"],
            ["nombre"=>"DEPORTES"],
            ["nombre"=>"SEGURIDAD CIUDADANA"]

        ];

        foreach($sectores as $sector)
        {
            Sector::create($sector);
        }


    }
}
