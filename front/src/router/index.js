import { createRouter, createWebHistory } from 'vue-router'
import App from '../App.vue'
import Login from '../views/Home.vue'
import Home from '../views/Home.vue'

const routes = [
    { path: '/', name: 'home', component: Home },
    //{ path: '/login', name: 'login', component: Login }
    ]

    const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
