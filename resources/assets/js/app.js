window.$ = window.jQuery = require('jquery');
window.Tether = require('tether');


require('bootstrap');

window.Laravel = { csrfToken: $('meta[name=csrf-token]').attr("content") };

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('hardware', require('./components/Hardware.vue'));

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

const app = new Vue({
    el: '#app',
    data:{
        ips:[
            '192.168.1.5',
            '192.168.1.149',
            ]
    }
});