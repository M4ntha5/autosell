
require('./bootstrap');

import Vue from 'vue'



/*
import VueRouter from 'vue-router';

import navbar from './components/Navbar.vue';
import ads from './components/ads/Ads.vue';
import showad from './components/ads/Show.vue';
import comments from './components/comments/Comments.vue';
import orders from './components/orders/Orders.vue';
import showorder from './components/orders/Show.vue';
import users from './components/users/Users.vue';
import signup from './components/auth/Signup.vue';
import signin from './components/auth/Signin.vue';




Vue.use(VueRouter);

const routes = [
    {path: '', comments: ads},
    {path: '/signup', comments: signup},
    {path: '/signip', comments: signin},
];
*/

window.Vue = require('vue');

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
Vue.component('signin', require('./components/auth/Signin.vue').default);
Vue.component('signup', require('./components/auth/Signup.vue').default);


const app = new Vue({
    el: '#app',
});
