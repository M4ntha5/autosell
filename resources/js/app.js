/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('navbar', require('./components/Navbar.vue').default);
//ads
Vue.component('ads', require('./components/ads/Ads.vue').default);
Vue.component('show-ad', require('./components/ads/Show.vue').default);
//Comments
Vue.component('comments', require('./components/comments/Comments.vue').default);
//Vue.component('show-c', require('./components/ads/Show.vue').default);
//orders
Vue.component('orders', require('./components/orders/Orders.vue').default);
Vue.component('show-order', require('./components/orders/Show.vue').default);
//users
Vue.component('users', require('./components/users/Users.vue').default);
Vue.component('show-user', require('./components/users/Show.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
