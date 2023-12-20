
import { createWebHistory, createRouter } from 'vue-router'
import home from './components/home.vue';


const routes = [                
    {
        name: 'home',
        path: '/hello',
        component: home

    }
];
const router = createRouter({
    history: createWebHistory(),
    routes

});
export default router;
