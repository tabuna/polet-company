require('./bootstrap');

require('../../../node_modules/jasny-bootstrap/dist/js/jasny-bootstrap.min');
require('../../../node_modules/bootstrap-maxlength/bootstrap-maxlength.min');
require('../../../node_modules/typed.js/dist/typed.min.js');

require('./modules/affix');
require('./modules/wizard');
require('./modules/cache');
require('./modules/typed');

window.Vue = require('vue');
import VueRouter from "vue-router";

Vue.use(VueRouter);


if (document.getElementById('app') !== null) {

    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/profile/edit',
                name: 'edit',
                component: require('./components/profile/edit.vue')
            },
            {
                path: '/profile/password',
                name: 'password',
                component: require('./components/Example.vue')
            },
            {
                path: '/profile/fave',
                name: 'fave',
                component: require('./components/profile/fave.vue')
            },
            {
                path: '/stats',
                name: 'stats',
                component: require('./components/Example.vue')
            },
            {
                path: '/payments',
                name: 'payments',
                component: require('./components/Example.vue')
            },
            {
                path: '/tender',
                name: 'tender',
                component: require('./components/tender/list.vue')
            },
            {
                path: '/tender/create',
                name: 'tender.create',
                component: require('./components/tender/create.vue')
            },
            {
                path: '/tender/:id',
                component: require('./components/tender/show.vue')
            },
            {
                path: '/search',
                component: require('./components/Example.vue')
            },
            {
                path: '/profile',
                redirect: '/profile/'+ meta_user,
            },
            {
                path: '/profile/:id',
                name: 'profile',
                component: require('./components/profile/show.vue')
            },
        ]
    });


    const app = new Vue({
        router,
        data: {
            user: {
                id: meta_user
            }
        }
    }).$mount('#app');
}
