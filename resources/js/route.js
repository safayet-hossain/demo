
import { createWebHistory, createRouter } from 'vue-router'
import home from './components/home.vue';
import login from './components/login.vue';
import profile from './components/profile.vue';
import Nsl from './components/Nsl.vue';
const routes = [
    {
        name: 'home',
        path: '/home',
        component: home

    },

    {
        name: 'login',
        path: '/login',
        component: login

    },
    {
        name: 'profile',
        path: '/profile/:name',
        component: profile

    },
    {
        name: 'NsL',
        path: '/Nsl',
        component: Nsl

    }


];
const router = createRouter({
    history: createWebHistory(),
    routes

});
export default router;
