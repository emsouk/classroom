import { createRouter, createWebHistory } from 'vue-router'
import App from '../App.vue'
import Login from '../views/Home.vue'
import Home from '../views/Home.vue'
import Welcome from '../views/Welcome.vue'

const routes = [
    { path: '/', name: 'home', component: Home },
    
    { path: '/welcome', name: 'welcome', component: Welcome }
    ]

    const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
