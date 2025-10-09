import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import Specialties from '../pages/specialties/Index.vue'
import Contact from '../pages/contact/Index.vue'
import Type from '../pages/types/Index.vue'
import Brand from '../pages/brands/Index.vue'
import Category from '../pages/categories/Index.vue'
import Product from '../pages/products/Index.vue'
import Banner from '../pages/banners/Index.vue'

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
    },
    {
        path: '/types',
        name: 'types',
        component: Type
    },
    {
        path: '/brands',
        name: 'brands',
        component: Brand
    },
    {
        path: '/categories',
        name: 'categories',
        component: Category
    },
    {
        path: '/products',
        name: 'products',
        component: Product
    },
    {
        path: '/banners',
        name: 'banners',
        component: Banner
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
