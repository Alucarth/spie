<template>
    <div >
		<div class="modal fade" id="ProgramaticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form id='formOperation' method='post' :action="url" @submit.prevent="validateBeforeSubmit">

                    <div class="modal-content">
                        <div v-html='csrf'></div>
						<input type="text" name="id" :value="form.id" v-if="form.id" hidden>
						<input type="text" name="entidad_id" :value="entidad" hidden>
						<input type="text" name="formulario_entidad_id" :value="formulario" hidden>
						<input type="text" name="resultado_id" :value="form.resultado_id" hidden>
						<input type="text" name="accion_id" :value="form.accion_id" hidden>
                        
                        
                        <div class="modal-header laravel-modal-bg">
                            <h5 class="modal-title" >{{title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Eje</label>
									<multiselect
										v-model="selectedEje"
										:options="ejesArray"
										id="id"										
										placeholder="Seleccionar"
										select-label="Seleccionar"																			
										label="descripcion"
										:custom-label="customLabelEje"
										track-by="code" >

									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
                        
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Metas</label>
									<multiselect
										v-model="selectedMeta"
										:options="metasArray"
										id="id"
										placeholder="Seleccionar"
										select-label="Seleccionar"
										
										label="descripcion"
										:custom-label="customLabelMeta"
										track-by="code" >

									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
                        
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Resultados</label>
									<multiselect
										v-model="selectedResultado"
										:options="resultadosArray"
										placeholder="Seleccionar"
										select-label="Seleccionar"
										label="descripcion"
										:custom-label="customLabelResultado"
										track-by="code">									
									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
							
                        	<div class="row" v-if="nuevaAccion==false">
								<div class="col-md-12 input-group input-group-sm ">
									<label for="programatic_structure" class="col-md-12">Accion </label>									
									<br/>															
									<multiselect
										v-model="selectedAccion"
										:options="accionesArray"										
										class="col-md-11"
										placeholder="Seleccionar"
										select-label="Seleccionar"										
										label="descripcion"
										:custom-label="customLabelAccion"
										track-by="code" >
									</multiselect>
									<button  v-if="nuevaAccion==false && selectedResultado != null " type="button" @click="activeNuevaAccion" class="btn btn-info btn-flat"> + </button>
									
									
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
							<div class="row" v-if="nuevaAccion==true">
								<div class="form-group   col-md-12">
									<label for="programatic_structure">Nombre de Acción 
										<button type="button" @click="desactiveNuevaAccion" class="btn btn-danger btn-flat"> - </button>
								</label>									
									 <textarea type="text" id="descripcion_nueva_accion" name="descripcion_nueva_accion" v-model="form.descripcion_nueva_accion"  class="form-control" placeholder="Nombre acción" v-validate="'required'" />									
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>							
							</div>

							<div class="row">
								<div class="form-group   col-md-12">
									<label for="programatic_structure">Descripcion de Acción</label>									
									<textarea type="text" id="descripcion_accion" name="descripcion_accion" v-model="form.descripcion_accion"  class="form-control" placeholder="Descripción" v-validate="'required'" />									
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>							
							</div>

							<div class="form-group col-md-4">
                                    <label for="ponderacion"> Codigo</label>
                                    <input type="text" id="codigo" name="codigo" v-model="form.codigo" class="form-control" placeholder="Codigo" v-validate="'required'" />
                                    <div class="invalid-feedback">{{ errors.first("codigo") }}</div>
                                </div>

							<div class="form-group col-md-12">
								<label for="clasificacion">Sector</label>
								<select name="sector_id" v-model="form.sector" class="custom-select" placeholder="Seleccionar" v-validate="'required'" >
									<option v-for="(item,index) in sectoresArray" :key="index" :value="item.id" >{{ item.nombre }}</option>                                        
								</select>
								<div class="invalid-feedback">{{ errors.first("clasificacion") }}</div>
                            </div>

							<div class="form-group col-md-12">
								<label for="clasificacion">Tipo</label>
								<select name="tipo_plan_institucional_id" v-model="form.tipo_plan_institucional_id" class="custom-select" placeholder="Seleccionar" v-validate="'required'" >
									<option v-for="(item,index) in tipoPlanArray" :key="index" :value="item.id" >{{ item.tipo }}</option>                                        
								</select>
								<div class="invalid-feedback">{{ errors.first("clasificacion") }}</div>
                            </div>

							<div class="form-group col-md-12">
								<label for="clasificacion">Presupuesto Total</label>
								<input type="text" id="presupuesto_total" name="presupuesto_total" v-model="form.meta" class="form-control" placeholder="Monto" v-validate="'required|decimal:2'" />
							</div>

							
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
		props:{
            url:String,
            csrf:String,
			entidad:String,
			formulario:String,
        },
        data:()=>({
			form:{},
			title:'',
            ejesArray:[],
            metasArray:[],
            resultadosArray:[],
            accionesArray:[],
			sectoresArray:[],
			tipoPlanArray:[],
			selectedEje:null ,
			selectedMeta:null,
			selectedResultado:null,
			selectedAccion:null,
			nuevaAccion:false
        }),
        mounted() {
			console.log('Componente Programatic Structure ')
			$('#ProgramaticModal').on('show.bs.modal',(event)=> {

                axios.get(`pdes/ejes/getAll`).then(response=>{
                            this.ejesArray = response.data;
                            console.log(this.ejesArray);
                });

				axios.get(`sectores`).then(response=>{
                            this.sectoresArray = response.data;
                            console.log(this.sectoresArray);
                });

				axios.get(`tipoPlanIntitucional`).then(response=>{
                            this.tipoPlanArray = response.data;
                            console.log(this.tipoPlanArray);
                });


				this.nuevaAccion = false;


				var button = $(event.relatedTarget) // Button that triggered the modal
				var dataSelect = button.data('json') // Extract info from data-* attributes
                this.title ='Nueva Operacion ';
				if(dataSelect)
				{   
    				this.title='Editar '+dataSelect.codigo;
                    axios.get(`${this.url}/${dataSelect.id}`).then(response=>{
                            this.form = response.data;
                            console.log(this.form);
                    });
				} else {
					this.form={};

				}
			})
		},
		methods:{
			customLabelEje({ descripcion, codigo }){
				return `[${codigo}] - ${descripcion} `;
			},
			customLabelMeta({ descripcion, codigo }){
				return `[${codigo}] - ${descripcion} `;
			},
			customLabelResultado({ descripcion, codigo }){
				return `[${codigo}] - ${descripcion} `;
			},
			customLabelAccion({ descripcion, codigo }){
				return `[${codigo}] - ${descripcion} `;
			},
			validateBeforeSubmit() {
				this.$validator.validateAll().then((result) => {
					if (result) {
					let form = document.getElementById("formOperation");
						form.submit();
						return;
					}
					toastr.error('Debe completar la informacion correctamente')
				});
            },
			activeNuevaAccion(){
				this.nuevaAccion = true;

			},
			desactiveNuevaAccion(){
				this.nuevaAccion = false;
				this.form.descripcion_nueva_accion = '';
			}
		},
		watch: {
			selectedEje: function() {
				this.metasArray=[];
				this.resultadosArray=[];
				this.accionesArray=[];
				this.selectedMeta=null;
				this.selectedResultado=null;
				this.selectedAccion=null;
				this.form.eje_id = this.selectedEje.id;
				axios.get(`pdes/metas/${this.selectedEje.id}`).then(response=>{
                            this.metasArray = response.data;
                            console.log(this.metasArray);
                });								
			},
			selectedMeta: function() {				
				// Clear previously selected values				
				this.resultadosArray=[];
				this.accionesArray=[];				
				this.selectedResultado=null;
				this.selectedAccion=null;
				this.form.meta_id = this.selectedMeta.id;
				axios.get(`pdes/resultados/${this.selectedMeta.id}`).then(response=>{
                            this.resultadosArray = response.data;
                            console.log(this.metasArray);
                });	
			},
			selectedResultado: function() {								
				this.accionesArray=[];	
				this.selectedAccion=null;		
				// Clear previously selected values
				this.form.resultado_id = this.selectedResultado.id;
				axios.get(`pdes/acciones/${this.selectedResultado.id}`).then(response=>{
                            this.accionesArray = response.data;
                            console.log(this.metasArray);
                });	
			},
			selectedAccion: function() {				
				// Clear previously selected values				
				//this.accionesArray=[];
				this.form.accion_id = this.selectedAccion.id;				

			}
		}
    }
</script>
