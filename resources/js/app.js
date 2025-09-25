import './bootstrap';
import { createApp } from 'vue';
import HomeSection from '@views/home/index.vue'

const app = createApp({
    // Puedes definir propiedades y métodos aquí si es necesario
});

// Registra tu componente globalmente
app.component('home-section', HomeSection);

// Monta la aplicación en el contenedor HTML
app.mount('#app');
