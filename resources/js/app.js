/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);


Vue.component('search-form-simple', require('./components/SearchFormSimple.vue').default);
Vue.component('search-form-advanced', require('./components/SearchFormAdvanced.vue').default);


const app = new Vue({
  el: '#app',
});
