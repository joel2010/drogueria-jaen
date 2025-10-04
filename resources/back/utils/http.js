import axios from 'axios'

// Crear una instancia
const http = axios.create({
    baseURL: '/', // ruta base de tu backend (Laravel usa /api por defecto)
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    withCredentials: true // necesario si usas cookies/sesiones en Laravel
})

// Interceptor para incluir CSRF Token (si usas sesiones con Sanctum)
http.interceptors.request.use(config => {
    const token = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content')
    if (token) {
        config.headers['X-CSRF-TOKEN'] = token
    }
    return config
})

// Interceptor de respuesta (manejo de errores)
http.interceptors.response.use(
    response => response,
    error => {
        if (error.response?.status === 401) {
            console.error('No autorizado, redirigir al login')
            window.location.href = '/login'
        }
        return Promise.reject(error)
    }
)

export default http
