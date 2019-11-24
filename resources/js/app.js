require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'


window.Vue = require('vue');

/*
Vue.use(VueRouter)

const routes = [
    { path: '/ads', component: require('./components/ads/Ads.vue').default },
    { path: '/ads/:ad', component: require('./components/ads/Update.vue').default },
    { path: '/test2', component: require('./components/test2.vue').default }
]

const router = new VueRouter({
    routes // short for `routes: routes`
})
*/

Vue.component('navbar', require('./components/Navbar.vue').default);
//ads
Vue.component('ads', require('./components/ads/Ads.vue').default);
Vue.component('show-ad', require('./components/ads/Show.vue').default);
//Vue.component('show-c', require('./components/ads/Show.vue').default);
//orders
Vue.component('orders', require('./components/orders/Orders.vue').default);
Vue.component('myorders', require('./components/orders/Myorders.vue').default);
//users
Vue.component('users', require('./components/users/Users.vue').default);

Vue.component('signin', require('./components/auth/Signin.vue').default);
Vue.component('signup', require('./components/auth/Signup.vue').default);


const app = new Vue({
    el: '#app',
    //router
});

$(document).ready(function() {
    $('#summernote').summernote();
});
