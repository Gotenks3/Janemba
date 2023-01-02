/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./swiper');

// import Vuetify from 'vuetify';
// Vue.use(Vuetify);

window.Vue = require('vue').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-preview1-component', require('./components/ImagePreview1Component.vue').default);
Vue.component('image-preview2-component', require('./components/ImagePreview2Component.vue').default);
Vue.component('image-preview3-component', require('./components/ImagePreview3Component.vue').default);
Vue.component('image-preview4-component', require('./components/ImagePreview4Component.vue').default);
Vue.component('delete-alert-component', require('./components/DeleteAlertComponent.vue').default);
Vue.component('icon-preview-component', require('./components/IconPreviewComponent.vue').default);

Vue.component('like-component', require('./components/LIkeComponent.vue').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
