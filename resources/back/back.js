import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import { es } from 'yup-locales'
// VeeValidate y Yup
import { configure } from 'vee-validate'
import { setLocale } from 'yup'

// Importar componente raíz
import App from './App.vue'

const app = createApp(App)

// Configuración global de vee-validate (ejemplo: mensajes en español)
setLocale(es)
configure({
    validateOnInput: true // valida en cada cambio
})

app.use(createPinia())
app.use(router)
app.use(ElementPlus)

app.mount('#app')
