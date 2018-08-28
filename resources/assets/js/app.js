
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

import axios from 'axios';
//global registration
import 'vue-instant/dist/vue-instant.css'
import VueInstant from 'vue-instant'
import vuelidate from 'vuelidate';
import VueSweetalert2 from 'vue-sweetalert2';
//global registration
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import 'vue-multiselect/dist/vue-multiselect.min.css'
import Multiselect from 'vue-multiselect'

Vue.use(VueSweetalert2);


Vue.use(VueFormWizard)

Vue.use(VueInstant)

Vue.use(vuelidate);


Vue.use(Multiselect);


Vue.use(BootstrapVue);

Vue.use(GridPlugin);
Vue.use(require('vue-moment'), {
    moment
});

Vue.component('pagination', require('laravel-vue-pagination'));


Vue.component('multiselect', Multiselect);

Vue.component('customers-index', require('./components/customers/customers-index'));
Vue.component('customers-details', require('./components/customers/customers-details'));
Vue.component('customers-create', require('./components/customers/customers-create'));

Vue.component('offers-index', require('./components/offers/offers-index'));
Vue.component('offers-view', require('./components/offers/offers-view'));
Vue.component('offers-create', require('./components/offers/offers-create'));

Vue.component('products-index', require('./components/products/products-index'));
Vue.component('products-create', require('./components/products/products-create'));
Vue.component('products-basic', require('./components/products/products-basic'));
Vue.component('products-extras', require('./components/products/products-extras'));

const app = new Vue({
    el: '#app'
});
