require('./bootstrap');
require('lightbox2');

window.Vue = require('vue');

Vue.component('list-skills', require('./components/listSkills.vue').default);

const app = new Vue({
    el: '#app',
});

