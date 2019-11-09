
require('./bootstrap');

import Vue from 'vue'


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



const app = new Vue({
    el: '#app',
});
