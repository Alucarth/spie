<?php

use Illuminate\Database\Seeder;
use App\Models\Formulario;
class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $formularios = [
            [ 'nombre'=> 'Plan Sectorial de Desarrollo Integral','sigla' => 'PSDI' ],
            [ 'nombre'=> 'Plan Estrategico Ministerial','sigla' => 'PEM' ],
            [ 'nombre'=> 'Plan Estrategico Institucional','sigla' => 'PEI' ],
            [ 'nombre'=> 'Plan Estrategico Empresarial','sigla' => 'PEE' ],
            [ 'nombre'=> 'Plan Estratégico Corporativo','sigla' => 'PEC' ],
            [ 'nombre'=> 'Plan Multisectorial de Desarrollo Integral','sigla' => 'PMDI' ],
            [ 'nombre'=> 'Plan Territorial de Desarrollo Integral','sigla' => 'PTDI' ]
        ];
        foreach($formularios as $form)
        {
           $formulario = Formulario::create(array $form);
        }
    }
}
