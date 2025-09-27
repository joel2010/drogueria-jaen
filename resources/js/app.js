import './bootstrap';
import { createApp } from 'vue';
import HomeSection from '@views/home/index.vue';
import AOS from "aos";
import "aos/dist/aos.css"; // 👈 importante si no lo tienes importado aún

const app = createApp({});

// Inicializar AOS después de que Vue haya montado
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
app.component('home-section', HomeSection);

app.mount('#app');
