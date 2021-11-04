/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ar' ;
import Vue from 'vue';
Vue.use(ElementUI , { locale });

window.Vue = require('vue').default;
Vue.component('pagination', require('laravel-vue-pagination'));

import Swal from 'sweetalert2';
window.Swal = Swal;

//for translate

require('lang.js');
 import VueLang from '@eli5/vue-lang-js'
 // get the data source
 import translations from './vue-translations.js';

 Vue.use(VueLang, {
     messages: translations, // Provide locale file
     locale: Lang, // Set locale
    //  fallback: 'ar' // Set fallback lacale
   });


import moment from 'moment';
Vue.filter('timeFormat',  (arg) => {
   return moment(arg).format("DD-MM-YYYY");
  });


  Vue.filter('str_limit', function (value) {
    if (!value) return '';
    value = value.toString();

    if (value.length <= 12) {
      return value;
    }
    return value.substr(0, 12) + '...';
  });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('structure-case', () => import('./components/projects/structureCase.vue'));
Vue.component('projects-create', () => import('./components/projects/projectsCreate.vue'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    props:['Lang'],

});
