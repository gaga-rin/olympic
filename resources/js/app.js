require('./bootstrap');

import Vue from 'vue'

Vue.component('index-component', require('./components/IndexComponent.vue').default);

const main = new Vue({
    el: '#app',
});