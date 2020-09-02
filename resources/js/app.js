require('./bootstrap');
require('lightbox2');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');
Vue.use(VueSweetalert2);

Vue.component('list-skills', require('./components/listSkills.vue').default);
Vue.component('state-vacancy', require('./components/stateVacancy.vue').default);
Vue.component('delete-vacancy', require('./components/deleteVacancy.vue').default);

const app = new Vue({
    el: '#app',
});

