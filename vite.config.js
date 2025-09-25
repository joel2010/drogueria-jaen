import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { fileURLToPath, URL } from 'node:url';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources', import.meta.url)),
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@views': fileURLToPath(new URL('./resources/js/views', import.meta.url)),
            '@components': fileURLToPath(new URL('./resources/js/components', import.meta.url)),
        },
    },
});
