require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-skills', require('./components/listSkills.vue').default);

const app = new Vue({
    el: '#app',
});
