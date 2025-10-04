import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import Specialties from '../pages/specialties/Index.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'home',
        component: Home
    },
    {
        path: '/specialties',
        name: 'specialties',
        component: Specialties
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
