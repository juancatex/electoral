window.Vue = require('vue').default;
window._ = require('lodash');
import "moment/locale/es"; 
window.moment =require('moment'); 
moment.locale('es-us'); 
window.axios = require('axios'); 
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 
import vSelect from "vue-select";
import 'vue-select/dist/vue-select.css';
 

Vue.component("v-select", vSelect);
Vue.component('mainmenu', require('./components/mainmenu.vue').default);
Vue.component('welcome', require('./components/welcome.vue').default);
Vue.component('registrouser', require('./components/registro.vue').default);
Vue.component('notificaciones', require('./components/noti.vue').default);
Vue.component('rolesusuario', require('./components/roles.vue').default);
Vue.component('botonrol', require('./components/plugins/botonrol.vue').default);
Vue.component('ajaxselect', require('./components/plugins/selectAjax.vue').default);
Vue.component('asignacionvista', require('./components/Vistas/AsignaciondeVistas.vue').default);
Vue.component('asignacionrol', require('./components/Vistas/AsignaciondeRolaSocio.vue').default);
Vue.component('regfrentes', require('./components/Vistas/Registrofrentes.vue').default);
Vue.component('regcandidatos', require('./components/Vistas/Regcandidatos.vue').default);
Vue.component('regcargos', require('./components/Vistas/RegCargo.vue').default);
Vue.component('regrequisitos', require('./components/Vistas/RegReq.vue').default);
Vue.component('modal_candidato', require('./components/Vistas/modal_candidato.vue').default);
Vue.component('modal_mod_candidato', require('./components/Vistas/modal_mod_candidato.vue').default);
Vue.component('modal_ver_candidato', require('./components/Vistas/modal_ver_candidato.vue').default);
Vue.component('modal_observaciones', require('./components/Vistas/modal_observaciones.vue').default);
Vue.component('modal_ver_observaciones', require('./components/Vistas/modal_ver_observaciones.vue').default);
Vue.component('initvotacion', require('./components/Vistas/Iniciarvotacion.vue').default);
Vue.component('revfrente', require('./components/Vistas/RevFrente.vue').default);
Vue.component('voto', require('./components/Vistas/Voto.vue').default);
Vue.directive('uppercase', {
	update (el) {
		el.value = el.value.toUpperCase()
	},
});
const app = new Vue({
    el: '#app',
});
