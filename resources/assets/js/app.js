
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const moment = require('moment')
require('moment/locale/bg')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import {GridPlugin} from '@syncfusion/ej2-vue-grids';
import '@syncfusion/ej2-vue-grids/styles/material.css'
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

Vue.use(GridPlugin);
Vue.use(require('vue-moment'), {
    moment
});

Vue.component('customers-index', require('./components/customers/customers-index'));
Vue.component('customers-details', require('./components/customers/customers-details'));
Vue.component('offers-index', require('./components/offers/offers-index'));

const app = new Vue({
    el: '#app'
});
