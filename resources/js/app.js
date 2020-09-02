require('./bootstrap');
require('lightbox2');

window.Vue = require('vue');

Vue.component('list-skills', require('./components/listSkills.vue').default);
Vue.component('state-vacancy', require('./components/stateVacancy.vue').default);

const app = new Vue({
    el: '#app',
});

