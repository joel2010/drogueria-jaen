<template>
    <el-menu mode="horizontal" text-color="#123B84" active-text-color="#123B84" :ellipsis="false" router class="!mb-5">
        <el-sub-menu index="2">
            <template #title>Productos</template>
            <el-menu-item :route="{ name: 'specialties' }" index="specialties">Especialidad</el-menu-item>
            <el-menu-item :route="{ name: 'types' }" index="types">Tipo</el-menu-item>
            <el-menu-item :route="{ name: 'brands' }" index="brands">Marca</el-menu-item>
            <el-menu-item :route="{ name: 'categories' }" index="categories">Categoría</el-menu-item>
            <el-menu-item :route="{ name: 'products' }" index="products">Productos</el-menu-item>
        </el-sub-menu>
        <el-menu-item :route="{ name: 'banners' }" index="banners">Banners</el-menu-item>
        <el-menu-item :route="{ name: 'contacts' }" index="contacts">Formulario de contacto</el-menu-item>
        <el-sub-menu index="5">
            <template #title>{{ user.name }}</template>
            <el-menu-item @click="onLogout">Cerrar sesión</el-menu-item>
        </el-sub-menu>
    </el-menu>
    <router-view />
</template>

<script setup>
import http from './utils/http';

const user = window.user

const onLogout = async () => {
    await http.post('/logout').then(() => {
        window.location.href = '/login'
    })
}
</script>
<style>
.el-menu--horizontal>.el-sub-menu:last-child {
    margin-left: auto;
}
</style>