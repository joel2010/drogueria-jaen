@php
// --- Datos del Producto (Ejemplo basado en tus imágenes) ---
$product = [
    'name' => 'Transpore 3M 1527-1',
    'subtitle' => 'Cinta médica hipoalergénica',
    // Actualización para carrusel: Usamos todas las imágenes disponibles
    'images' => [
        '/productdetail.png',
        '/productdetail.png',
        '/productdetail.png',
        '/productdetail.png',
    ],
    // 'image_main' y 'images_thumbs' ya no son necesarios con la nueva estructura
    'description_points' => [
        'El corte fácil, recto y bidireccional permite al profesional de la salud cortar la cinta a la medida sin necesidad de tijeras.',
        'Su porosidad permite el normal funcionamiento e intercambio gaseoso de la piel.',
        'Fácil de manipular con guantes.',
        'Buena adhesión a la piel y a los tubos para una colocación segura.',
        'Transparente para permitir un control fácil.',
        'Hipoalergénico y sin látex para pacientes sensibles.',
        'Buena resistencia a la penetración del agua o la humedad de la piel (sudor).',
    ],
    'specs' => [
        'TIPO' => 'Cinta Quirúrgica',
        'PRESENTACIÓN' => 'Caja 12 unidades',
        'ESPECIALIDAD' => 'Emergencia',
    ]
];
@endphp

@extends('layout.app')

@section('content')
<div>
    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 bg-gray-100">

        {{-- Navegación (Breadcrumbs) --}}
        <div class="max-width mx-auto tablet:mt-10">
            <div class="mb-6 border-b border-gray-400 pb-2">
                <a href="#" class="text-subtitle hover:text-primary">Inicio</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-subtitle hover:text-primary">Productos</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-subtitle !text-primary">Dispositivos médicos</a>
            </div>

            {{-- Contenido Principal del Producto --}}
            <div class="lg:grid lg:grid-cols-[2fr_3fr] lg:gap-10">

                {{-- COLUMNA IZQUIERDA: IMAGEN y MINIATURAS (ADAPTADA) --}}
                <div class="flex flex-col items-center">

                    {{-- Carrusel de Imágenes (Mobile) / Imagen Estática (Desktop) --}}
                    <div class="w-full relative overflow-hidden bg-white rounded-xl shadow-lg p-6 lg:p-0 lg:shadow-none lg:rounded-none lg:bg-transparent">

                        {{-- Carrusel para Mobile (visible solo en pantallas pequeñas) --}}
                        <div id="image-carousel-mobile"
                            class="lg:hidden flex overflow-x-scroll snap-x snap-mandatory scroll-smooth"
                            style="scroll-snap-type: x mandatory;">
                            @foreach ($product['images'] as $index => $image)
                            <div class="flex-shrink-0 w-full snap-center h-[300px] flex justify-center items-center">
                                <img src="{{ asset('images/' . $image) }}"
                                    alt="{{ $product['name'] }} - Imagen {{ $index + 1 }}"
                                    class="max-h-80 object-contain w-full transition-opacity duration-300">
                            </div>
                            @endforeach
                        </div>

                        {{-- Imagen Principal Estática para Desktop (visible solo en pantallas grandes) --}}
                        <div
                            class="hidden lg:flex justify-center items-center w-full h-[300px] max-w-lg lg:max-w-none mb-4 bg-white rounded-xl shadow-lg p-6">
                            <img id="main-product-image-desktop" src="{{ asset('images/' . $product['images'][0]) }}"
                                alt="{{ $product['name'] }}"
                                class="max-h-80 object-contain transition-opacity duration-300">

                            {{-- Icono de Zoom para Desktop --}}
                            <button class="absolute top-4 right-4 text-gray-700 hover:text-primary p-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- Puntos Indicadores para Mobile --}}
                        <div id="carousel-dots-mobile" class="lg:hidden absolute bottom-2 left-0 right-0 flex justify-center space-x-2 p-2">
                            @foreach ($product['images'] as $index => $image)
                            <span class="dot-indicator w-2 h-2 rounded-full bg-gray-400 transition-colors duration-300 {{ $index === 0 ? '!bg-primary' : '' }}"
                                data-index="{{ $index }}"></span>
                            @endforeach
                        </div>

                    </div>

                    {{-- Miniaturas de Imagen (Thumbnails) para Desktop (visible solo en pantallas grandes) --}}
                    <div id="desktop-thumbnails" class="hidden lg:flex justify-center space-x-3 w-full mt-2">
                        @foreach ($product['images'] as $index => $thumb)
                        <button
                            class="thumb-selector w-20 h-20 border-2 shadow-lg rounded-lg p-1 bg-white hover:border-primary transition-colors {{ $index === 0 ? 'border-primary' : 'border-gray-300' }}"
                            data-image-src="{{ asset('images/' . $thumb) }}">
                            <img src="{{ asset('images/' . $thumb) }}" alt="Miniatura {{ $index + 1 }}"
                                class="w-full h-full object-contain">
                        </button>
                        @endforeach
                    </div>
                </div>
                {{-- FIN DE COLUMNA IZQUIERDA --}}

                {{-- COLUMNA DERECHA: DETALLES (SIN CAMBIOS) --}}
                <div class="mt-8 lg:mt-0 bg-transparent tablet:p-6 rounded-xl">

                    {{-- Título y Subtítulo --}}
                    <h1 class="text-title">{{ $product['name'] }}</h1>
                    <p class="text-description mb-3">{{ $product['subtitle'] }}</p>

                    {{-- Descripción --}}
                    <div class="mb-4">
                        <h2 class="text-subtitle !text-primary mb-2 uppercase">
                            DESCRIPCIÓN
                        </h2>
                        <ul class="list-none space-y-2 text-description">
                            @foreach ($product['description_points'] as $point)
                            <li class="flex items-start mb-0">
                                <span class="text-primary mr-2 text-description font-bold">&middot;</span>
                                <span>{{ $point }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Especificaciones --}}
                    <div class="mb-8">
                        <h2 class="text-subtitle !text-primary mb-2 uppercase">
                            Especificaciones</h2>
                        <div class="space-y-2 text-gray-700">
                            @foreach ($product['specs'] as $key => $value)
                            <p class="flex gap-1 items-center">
                                <strong class="uppercase text-sm block sm:inline">{{ $key }}:</strong>
                                <span class="sm:ml-1">{{ $value }}</span>
                            </p>
                            @endforeach
                        </div>
                    </div>

                    {{-- Botones de Contacto --}}
                    <div
                        class="border-t border-gray-400 pt-4 flex flex-col sm:flex-row gap-2 items-center justify-between space-y-4 sm:space-y-0">
                        <div class="flex gap-3 mb-3 tablet:mb-3">
                            <a href="https://wa.me/?text=Me%20interesa%20el%20producto%20{{ urlencode($product['name']) }}"
                                target="_blank"
                                class="flex items-center w-full sm:w-auto justify-center transition-colors text-lg max-w-max min-w-[40px]">
                                <img src="/icons/wsp-transparent.png" alt="WhatsApp Icon" class="w-10 h-10">

                            </a>

                            <button
                                class="flex items-center w-full sm:w-auto justify-center bg-primary text-white font-semibold py-1 px-6 rounded-full shadow-lg hover:bg-primary-dark transition-colors text-lg min-w-max">
                                Más información
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        {{-- Redes Sociales (Siguenos en:) --}}
                        <div
                            class="pt-6 border-t border-gray-400 tablet:border-t-0 w-full tablet:pt-0 flex items-center justify-center sm:justify-end text-gray-700">
                            <span class="mr-3 font-semibold text-sm">Síguenos en:</span>
                            <div class="flex space-x-3">
                                <div class="flex space-x-4">
                                    <a href="#" aria-label="Facebook"
                                        class="text-gray-600 hover:text-blue-600 transition-colors">
                                        <img src="/icons/fb.svg" alt="icono Facebook" class="w-5 h-5">
                                    </a>
                                    <a href="#" aria-label="TikTok"
                                        class="text-gray-600 hover:text-black transition-colors">
                                        <img src="/icons/tiktok.svg" alt="icono TikTok" class="w-5 h-5">
                                    </a>
                                    <a href="#" aria-label="Instagram"
                                        class="text-gray-600 hover:text-pink-600 transition-colors">
                                        <img src="/icons/instagram.svg" alt="icono Instagram" class="w-5 h-5">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- FIN DE COLUMNA DERECHA --}}

            </div>
        </div>
    </div>
</div>
@include('products.partials.products-featured')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselMobile = document.getElementById('image-carousel-mobile');
        const dotsMobile = document.querySelectorAll('#carousel-dots-mobile .dot-indicator');
        const mainImageDesktop = document.getElementById('main-product-image-desktop');
        const thumbSelectors = document.querySelectorAll('#desktop-thumbnails .thumb-selector');

        // --- Lógica para Desktop (Miniaturas) ---
        if (mainImageDesktop && thumbSelectors.length > 0) {
            thumbSelectors.forEach(button => {
                button.addEventListener('click', function() {
                    const newSrc = this.getAttribute('data-image-src');

                    // 1. Cambiar la imagen principal con animación
                    mainImageDesktop.style.opacity = '0';
                    setTimeout(() => {
                        mainImageDesktop.src = newSrc;
                        mainImageDesktop.style.opacity = '1';
                    }, 100);

                    // 2. Actualizar el estilo del borde de la miniatura activa
                    thumbSelectors.forEach(t => t.classList.remove('border-primary', 'border-gray-300'));
                    thumbSelectors.forEach(t => t.classList.add('border-gray-300')); // Resetear a gris
                    this.classList.remove('border-gray-300');
                    this.classList.add('border-primary'); // Activar el color principal
                });
            });
        }

        // --- Lógica para Mobile (Carrusel con Dots) ---
        if (carouselMobile && dotsMobile.length > 0) {
            const updateDots = () => {
                // Calcular qué imagen está centrada (o casi)
                const scrollLeft = carouselMobile.scrollLeft;
                const imageWidth = carouselMobile.offsetWidth;
                // Índice de la imagen visible (redondeado para manejar el scroll parcial)
                const activeIndex = Math.round(scrollLeft / imageWidth);

                // Actualizar los puntos
                dotsMobile.forEach((dot, index) => {
                    dot.classList.remove('!bg-primary');
                    dot.classList.add('bg-gray-400');
                    if (index === activeIndex) {
                        dot.classList.remove('bg-gray-400');
                        dot.classList.add('!bg-primary');
                    }
                });
            };

            // Ejecutar al hacer scroll
            carouselMobile.addEventListener('scroll', updateDots);

            // Permitir que los puntos naveguen (opcional, pero mejora la UX)
            dotsMobile.forEach(dot => {
                dot.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    const imageWidth = carouselMobile.offsetWidth;
                    carouselMobile.scrollTo({
                        left: index * imageWidth,
                        behavior: 'smooth'
                    });
                });
            });

            // Inicializar al cargar
            updateDots();
        }
    });
</script>
