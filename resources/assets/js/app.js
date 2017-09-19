

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


const moment = require('moment');
require('moment/locale/ru');

Vue.use(require('vue-moment'), {
    moment
});


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
                name: 'tender.show',
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


var Turbolinks = require("turbolinks")
Turbolinks.start()
}

document.addEventListener("turbolinks:load", function() {
 $(window).trigger("load");
 dispatchEvent(new Event('load'));


 window.wow = new WOW(
     {
         boxClass:     'wow',      // animated element css class (default is wow)
         animateClass: 'animated', // animation css class (default is animated)
         offset:       0,          // distance to the element when triggering the animation (default is 0)
         mobile:       true,       // trigger animations on mobile devices (default is true)
         live:         true,       // act on asynchronously loaded content (default is true)
         callback:     function(box) {
             // the callback is fired every time an animation is started
             // the argument that is passed in is the DOM node being animated
         },
         scrollContainer: null,    // optional scroll container selector, otherwise use window,
         resetAnimation: false,     // reset animation on end (default is true)
     }
 );
 wow.init();
})
