
import { createWebHistory, createRouter } from 'vue-router'
import home from './components/home.vue';
import login from './components/login.vue';
import profile from './components/profile.vue';
import Student from './components/Student.vue';
import student_list  from './components/student_list.vue';
import student_edit  from './components/student_edit.vue';
import user from './components/user.vue';
import userlist from "./components/userlist.vue";
import user_edit from "./components/user_edit.vue";
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
        name: 'Student',
        path: '/Student',
        component: Student

    },
    {
        name: 'student_list',
        path: '/student_list/',
        component: student_list

    },
    
    {
        name: 'student_edit',
        path: '/student/:id/edit',
        component: student_edit

    },
    {
        name: 'user',
        path: '/user',
        component: user

    },
    
    {
        name: 'userlist',
        path: '/userlist',
        component: userlist

    },
    {
        name: 'user_edit',
        path: '/user/:id/edit',
        component: user_edit

    },
    

];
const router = createRouter({
    history: createWebHistory(),
    routes

});
export default router;
