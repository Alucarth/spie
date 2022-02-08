<template>
    <div >
		<div class="modal fade" id="ModalStructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form id='formOperation' method='post' :action="url" @submit.prevent="validateBeforeSubmit">

                    <div class="modal-content">
                        <div v-html='csrf'></div>
						<input type="text" name="id" :value="form.id" v-if="form.id" hidden>
                        <input type="text" name="padre" :value="padre" v-if="padre">
                        <div class="modal-header laravel-modal-bg">
                            <h5 class="modal-title" >{{title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
							<legend>Eje PDES</legend>
							<div class="row">
                                <div class="form-group col-md-3">
                                    <label for="codigo">Codigo</label>
                                    <input type="text" id="codigo" name="codigo" v-model="form.codigo" class="form-control" placeholder="Descripcion" v-validate="'required'" />
                                    <div class="invalid-feedback">{{ errors.first("codigo") }}</div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="linea_base_valor">Linea Base</label>
                                    <input type="text" id="linea_base_valor" name="linea_base_valor" v-model="form.linea_base_valor" class="form-control" placeholder="Linea base" v-validate="'required'" />
                                    <div class="invalid-feedback">{{ errors.first("linea_base_valor") }}</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="descripcion">Indicador</label>
                                    <input type="text" id="descripcion" name="descripcion" v-model="form.descripcion" class="form-control" placeholder="Descripcion" v-validate="'required'" />
                                    <div class="invalid-feedback">{{ errors.first("descripcion") }}</div>
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
		props:['url','csrf','padre'],
        data:()=>({
			form:{},
			title:'',            
        }),
        mounted() {
			console.log('Componente Programatic Structure ')
			$('#ModalStructure').on('show.bs.modal',(event)=> {
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
