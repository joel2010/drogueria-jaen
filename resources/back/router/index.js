import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import Specialties from '../pages/specialties/Index.vue'
import Contact from '../pages/contact/Index.vue'

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
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: Contact
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
