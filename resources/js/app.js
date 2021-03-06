
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// import 'fullcalendar';/
import VeeValidate from "vee-validate";
import Vuetify from 'vuetify';
import Multiselect from 'vue-multiselect';
window.Inputmask = require('inputmask');
import 'jspdf-autotable';

window.Switchery = require('switchery');
window.Vue = require('vue');
window.moment = require('moment');
window.numeral = require('numeral');
window.toastr = require('toastr');
window.swal = require('sweetalert');
window.Swal = require('sweetalert2');
window.jsPDF = require('jspdf');
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

Vue.use(Vuetify);
Vue.component('multiselect', Multiselect)

window.moment.locale('es');


window.Chart = require('chart.js');
window.spanish_lang = require('./datatable_spanish');


let moneyInputMask = {
    alias: "numeric",
    groupSeparator: ",",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    // prefix: "Bs ",
    placeholder: "0",
    max:1000000000
  };
  Vue.directive('money',{
    inserted: function(el) {
      Inputmask(moneyInputMask).mask(el);
    }
  })
  Vue.directive('decimal',{
    inserted: function(el) {
      Inputmask({
          alias: "decimal",
          groupSeparator: "",
          autoGroup: true,
          digits: 2,
          digitsOptional: false,
          placeholder: "0",
          max:1000000000
      }).mask(el);
    }
  });
  let dateInputMask = {
    alias: "datetime",
    inputFormat: "dd/mm/yyyy"
  }
  Vue.directive('date',{
    inserted: function(el) {
      Inputmask(dateInputMask).mask(el);
    }
  })
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VeeValidate, {
    classes: true,
    classNames: {
        valid: "is-valid",
        invalid: "is-invalid"
    }
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('indicadores-component', require('./components/IndicadoresComponent.vue').default);
Vue.component('operaciones-component', require('./components/OperacionesComponent.vue').default);
Vue.component('tareas-component', require('./components/TareasComponent.vue').default);
Vue.component('years-component', require('./components/YearsComponent.vue').default);
Vue.component('operations-component', require('./components/OperationsComponent.vue').default);
Vue.component('tasks-component', require('./components/TasksComponent.vue').default);
Vue.component('executions-component', require('./components/ExecutionsComponent.vue').default);
Vue.component('specific-task-component', require('./components/SpecificTaskComponent.vue').default);
Vue.component('execution-specific-tasks-component', require('./components/ExecutionSpecificTask.vue').default);
Vue.component('report-component', require('./components/ReportComponent.vue').default);
Vue.component('chart-component', require('./components/chartComponent.vue').default);
Vue.component('programatic-component', require('./components/ProgramaticStructure.vue').default);
Vue.component('pgdes-component', require('./components/PgdesStructure.vue').default);
Vue.component('role-component', require('./components/RoleComponent.vue').default);
Vue.component('pdes-form-component', require('./components/PdesForm.vue').default);
Vue.component('indicador-form-component', require('./components/IndicadorForm.vue').default);
Vue.component('plani-form-component', require('./components/PlaniForm.vue').default);

Vue.component('plan-institucional', require('./components/PlanInstitucional.vue').default);
Vue.component('asignacion-formulario-component', require('./components/AsignacionFormulario.vue').default);
Vue.component('plan-component', require('./components/PlanInstitucional.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted(){
        //loading config default
        $('[data-toggle="tooltip"]').tooltip();
        // var elem =document.querySelector('.js-switch');
        // var init = new Switchery(elem,  { color: '#41b7f1',size: 'larger' });
    }
});
