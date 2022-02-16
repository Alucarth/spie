<template>
<div>
    <legend>Formulario: {{formulario.nombre}} </legend>
    <div class="row">
        <div class="col-md-6">
            <!-- inicio card -->
            <div class="card card-primary">
            <div class="card-body">
                <h3 class="card-title">Responsable</h3>
                 <div class="form-group">
                <label for="exampleInputEmail1">Entidad</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" :value="entidad.descripcion" disabled>
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Areas Organizacionales ?</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sector</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <h3 class="card-title">Informacion</h3>

                <div class="form-group">
                    <label for="exampleInputPassword1">Codigo</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" v-model="form.codigo">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Descripcion del Resultado(impacto sectorial)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" v-model="form.descripcion_resultado">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Indicador (Resultado/Accion) ?</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" v-model="form.descripcion_accion" >
                </div>

            </div>
            </div>
            <!-- fin card -->



            <!-- inicio card -->
            <div class="card card-primary">
            <div class="card-body">
                <h3 class="card-title">Territorializacion</h3>
                 <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" v-model="plan_institucional_id" >
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Departamento ?</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=""  >
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Codigo</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Region ?</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Codigo</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Municipio ?</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Urbano/Rural ?</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Distrito ? </label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>


            </div>
            </div>
            <!-- fin card -->




        </div>

        <div class="col-md-6">

             <!-- inicio card -->
            <div class="card card-primary">
            <div class="card-body">
                <h3 class="card-title">Inicador</h3>
                 <div class="form-group">
                <label for="exampleInputEmail1">Formula</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" v-model="indicador.formula" >
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Linea Base 2020</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" v-model="indicador.linea_base">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">al 2025 ?</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <h3 class="card-title">Programacion Fisica ?</h3>

                <div class="form-group">
                    <label for="exampleInputPassword1">2021</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2022</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2023</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2024</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2025</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
            </div>
            </div>
            <!-- fin card -->

             <!-- inicio card -->
            <div class="card card-primary">
            <div class="card-body">

                 <div class="form-group">
                <label for="exampleInputEmail1">Ponderacion(por prioridad)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" >
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Fuente de Informacion</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Presupuesto Total (En Millones de Bolivianos)</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>


            </div>
            </div>
            <!-- fin card -->


            <!-- inicio card -->
            <div class="card card-primary">
            <div class="card-body">
                <h3 class="card-title">Programacion Financiera de los Recursos para Ejecutar las Acciones Sectioriales ?</h3>

                <div class="form-group">
                    <label for="exampleInputPassword1">2021</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2022</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2023</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2024</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">2025</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>


            </div>
            </div>
            <!-- fin card -->



        </div>



    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="text" :value="JSON.stringify(form)">
            <input type="text" :value="JSON.stringify(indicador)">

             <button class="btn btn-danger">Cancelar</button>
            <button class="btn btn-success">Guardar</button>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- {{formulario}} -->
</div>
</template>
<script>
export default {
    name:"Formulario",
    props:['formulario','entidad'],
    data:()=>({
        form:{},
        indicador:{},
    }),
    mounted()
    {
        console.log("form:",this.formulario)
        console.log("entidad:",this.entidad)

    }
}
</script>
