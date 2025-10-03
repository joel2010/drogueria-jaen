import './bootstrap';
import { createApp } from 'vue';
import CatalogSection from '@components/products/index.vue';
import AOS from "aos";
import "aos/dist/aos.css";

const app = createApp({});

app.mixin({
    mounted() {
        AOS.init({
            once: true,
            duration: 400,
            easing: 'ease-out',
            offset: 0,
        });
    }
});

// Registrar componente global
app.component('catalog-products', CatalogSection);

app.mount('#app');
