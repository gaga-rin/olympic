require('./bootstrap');

import Vue from 'vue'
import axios from 'axios'

Vue.prototype.$axios = axios;

Vue.component('index-component', require('./components/IndexComponent.vue').default);

const main = new Vue({
    el: '#app',
});