<?php

use Illuminate\Database\Seeder;
use App\TipoPlanInstitucional;
class TipoPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos = [
            ["tipo"=>"Programa"],
            ["tipo"=>"Proyecto"],
            ["tipo"=>"Normativa"]
        ];

        foreach($tipos as $tipo)
        {
            TipoPlanInstitucional::create($tipo);
        }
    }
}
