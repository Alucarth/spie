<?php

use Illuminate\Database\Seeder;
use App\TipoProgramacionFinanciera;
class TipoProgramacionSeeder extends Seeder
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
            ["tipo"=>"Presupuesto"],
            ["tipo"=>"Gasto Corriente"],
            ["tipo"=>"Gasto Inversion"]
        ];

        foreach($tipos as $tipo)
        {
            TipoProgramacionFinanciera::create($tipo);
        }
    }
}
