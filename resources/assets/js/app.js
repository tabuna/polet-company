require('./bootstrap');

require('../../../node_modules/jasny-bootstrap/dist/js/jasny-bootstrap.min');
require('../../../node_modules/bootstrap-maxlength/bootstrap-maxlength.min');

require('./modules/affix');
require('./modules/wizard');

window.Vue = require('vue');
import VueRouter from "vue-router";

Vue.use(VueRouter);


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/profile/:id',
            name: 'profile',
            component: require('./components/profile/show.vue')
        },
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
            component: require('./components/Example.vue')
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
            component: require('./components/Example.vue')
        },
        {
            path: '/tender/create',
            component: require('./components/Example.vue')
        },
        {
            path: '/tender/:id',
            component: require('./components/Example.vue')
        },
        {
            path: '/search',
            component: require('./components/Example.vue')
        },
    ]
});




const app = new Vue({
    router,
    data: {
        user: {
            id: meta_user.content
        }
    }
}).$mount('#app');
