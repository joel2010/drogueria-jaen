import './bootstrap';
import { createApp } from 'vue';
import CatalogSection from '@components/products/index.vue';
import AOS from "aos";
import "aos/dist/aos.css";
import Glide, { Controls, Breakpoints } from '@glidejs/glide/dist/glide.modular.esm';

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

document.addEventListener("DOMContentLoaded", () => {
    // Mobile slider
    new Glide(".desktop\\:hidden.glide", {
        type: "carousel",
        perView: 2,
        gap: 16,
        startAt: 0,
        breakpoints: {
            768: { perView: 2 }
        }
    }).mount({ Controls, Breakpoints });

    new Glide(".desktop\\:block.glide", {
        type: "carousel",
        perView: 4,
        startAt: 0,
        gap: 24
    }).mount({ Controls, Breakpoints });

        new Glide(".glide-features", {
        type: "carousel",
        perView: 1,     // 👈 solo 1 por página
        gap: 16,
        startAt: 0
    }).mount({ Controls, Breakpoints });
});


// Registrar componente global
app.component('catalog-products', CatalogSection);

app.mount('#app');
