
import { createWebHistory, createRouter } from 'vue-router'
import home from './components/home.vue';
import login from './components/login.vue';
import profile from './components/profile.vue';


const routes = [
    {
        name: 'home',
        path: '/hello',
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

    }
];
const router = createRouter({
    history: createWebHistory(),
    routes

});
export default router;
