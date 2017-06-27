require('./bootstrap');

require('./modules/scroll');
require('./modules/affix');
require('./modules/wizard');
require('./modules/cache');
require('./modules/typed');


window.Vue = require('vue');

import VueRouter from "vue-router";
import infiniteScroll from 'vue-infinite-scroll'
import wysiwyg from "vue-wysiwyg";


Vue.use(wysiwyg, {
    hideModules: {
        "hyperlink": true,
        "image": true,
        "table": true,
    },
});

Vue.use(infiniteScroll);
Vue.use(VueRouter);
Vue.use(require('vue-moment'));

require('./directive/select2company');


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
                component: require('./components/profile/password.vue')
            },
            {
                path: '/profile/fave',
                name: 'fave',
                component: require('./components/profile/fave.vue')
            },
            {
                path: '/stats',
                name: 'stats',
                component: require('./components/profile/stats.vue')
            },
            {
                path: '/payments',
                name: 'payments',
                component: require('./components/payment/list.vue')
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
                path: '/profile',
                redirect: '/profile/' + meta_user,
            },
            {
                path: '/profile/:id',
                name: 'profile',
                component: require('./components/profile/show.vue')
            },
            {
                path: '/messages',
                name: 'messages',
                component: require('./components/message/list.vue')
            },
            {
                path: '/message/:id',
                name: 'message',
                component: require('./components/message/chat.vue')
            },
            {
                path: '/companies',
                name: 'companies',
                component: require('./components/profile/list.vue'),
                props: (route) => ({
                    query: route.query.tags
                })
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
