import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Dashboard from './pages/Dashboard.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                auth: false
            },
        },
        {
            path: '/about',
            name: 'about',
            component: About,
            meta: {
                auth: false
            },
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact,
            meta: {
                auth: false
            },
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            },
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            },
        },
        // USER ROUTES
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                auth: true
            },
        },
    ]
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')
  
    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
      next('/login')
      return
    }
    next()
  })

export default router;