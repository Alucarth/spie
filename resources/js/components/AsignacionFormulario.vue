<template>
    <div >
		<div class="modal fade" id="ProgramaticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form id='formOperation' method='post' :action="url" @submit.prevent="validateBeforeSubmit">

                    <div class="modal-content">
                        <div v-html='csrf'></div>
						<input type="text" name="id" :value="form.id" v-if="form.id" hidden>

                        <input type="text" name="entidad_id" :value="form.entidad_id" hidden>
                        <input type="text" name="formulario_id" :value="form.formulario_id" hidden>

                        <div class="modal-header laravel-modal-bg">
                            <h5 class="modal-title" >{{title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
							<input type="text" v-if="form.id" name="programmatic_structure_id" v-model="form.id" hidden>
                            <input type="text" name="programmatic_operations" :value="JSON.stringify(form.programmatic_operations)" hidden>
							<legend>Asignar Formulario</legend>
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Entidad</label>
									<multiselect
										v-model="selectedEntidad"
										:options="entidadesArray"
										id="id"										
										placeholder="Seleccionar"
										select-label="Seleccionar"																			
										label="descripcion"
										:custom-label="customLabelEntidad"
										track-by="code" >

									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
                            <div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Formulario</label>
									<multiselect
										v-model="selectedFormulario"
										:options="formulariosArray"
										id="id"										
										placeholder="Seleccionar"
										select-label="Seleccionar"																			
										label="nombre"
										:custom-label="customLabelFormulario"
										track-by="code" >

									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
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
		props:['url','csrf'],
        data:()=>({
			form:{},
			title:'',
            entidadesArray:[],
            formulariosArray:[],
            selectedEntidad:null,
            selectedFormulario:null
        }),
        mounted() {
			console.log('Componente Programatic Structure ')


			$('#ProgramaticModal').on('show.bs.modal',(event)=> {
                axios.get(`entidades/getAll`).then(response=>{
                            this.entidadesArray = response.data;
                            console.log(this.entidadesArray);
                });

				axios.get(`formularios/getAll`).then(response=>{
                            this.formulariosArray = response.data;
                            console.log(this.sectoresArray);
                });

				var button = $(event.relatedTarget) // Button that triggered the modal
				var dataSelect = button.data('json') // Extract info from data-* attributes
                //console.log(dataSelect.id,"aaaaaa");
                this.title ='Nueva Operacion ';
				if(dataSelect)
				{   
    				this.title='Editar '+dataSelect.code;

                    axios.get(`planes/pgdes/${dataSelect.id}`).then(response=>{
                            this.form = response.data;
                            console.log(this.form);
                            // console.log(this.form);
                            // this.meta_temp = response.data.operation.meta;
                            // this.ponderacion_temp = response.data.operation.weighing;
                    });

					// this.form = operation;
				}else
				{
					this.form={};

				}

				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

			})
		},
		methods:{
            customLabelEntidad({ descripcion, codigo }){
				return `[${codigo}] - ${descripcion} `;
			},
            customLabelFormulario({ nombre, sigla }){
				return `[${sigla}] - ${nombre} `;
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
            



		},
        watch: {
			selectedEntidad: function() {
				this.form.entidad_id = this.selectedEntidad.id;		
			},
            selectedFormulario: function() {				
				this.form.formulario_id = this.selectedFormulario.id;
			},
		},
		computed:{
            // getMeta(){
            //     return parseFloat(this.total_meta)+ parseFloat(this.meta_temp);
            // },
            // getPonderacion(){
            //     return parseFloat(this.total_ponderacion)+ parseFloat(this.ponderacion_temp);
            // }
		}
    }
</script>
