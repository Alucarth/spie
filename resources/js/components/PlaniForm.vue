<template>
    <div >
		<div class="modal fade" id="ProgramaticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form id='formOperation' method='post' :action="url" @submit.prevent="validateBeforeSubmit">

                    <div class="modal-content">
                        <div v-html='csrf'></div>
						<input type="text" name="id" :value="form.id" v-if="form.id" hidden>
                        
                        
                        <div class="modal-header laravel-modal-bg">
                            <h5 class="modal-title" >{{title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         <div class="modal-body">
							<legend>Eje</legend>
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Eje</label>
									<multiselect
										v-model="form.eje_id"
										:options="ejesArray"
										id="id"
										placeholder="Seleccionar Eje"
										select-label="Seleccionar"
										deselect-label="Remover"
										selected-label="Seleccionado"
										label="descripcion"
										track-by="code" >

									</multiselect>
									<div class="invalid-feedback">{{ errors.first("code") }}</div>
								</div>
							</div>
                        </div>
                        <div class="modal-body">
							<legend>ACCION</legend>
							<div class="row">
								<div class="form-group  col-md-12">
									<label for="programatic_structure">Codigo</label>
									<multiselect
										v-model="form.accion_id"
										:options="accionesArray"
										id="id"
										placeholder="Seleccionar Codigo"
										select-label="Seleccionar"
										deselect-label="Remover"
										selected-label="Seleccionado"
										label="descripcion"
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
		props:{
            url:String,
            csrf:String,
        },
        data:()=>({
			form:{},
			title:'',
            ejesArray:[],
            metasArray:[],
            resultadosArray:[],
            accionesArray:[]            
        }),
        mounted() {
			console.log('Componente Programatic Structure ')
			$('#ProgramaticModal').on('show.bs.modal',(event)=> {

                axios.get(`pdes/ejes/all`).then(response=>{
                            this.ejesArray = response.data;
                            console.log(this.ejesArray);
                });


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
		computed:{

		}
    }
</script>
