@extends('layout.app')

@section('content')
    <div>
        <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 bg-gray-100">

            <div class="max-width mx-auto tablet:mt-10">
                <div class="mb-6 border-b border-gray-400 pb-2">
                    <a href="/" class="text-subtitle hover:text-primary">Inicio</a>
                    <span class="mx-2">|</span>
                    <a href="/productos" class="text-subtitle hover:text-primary">Productos</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="text-subtitle !text-primary">Dispositivos médicos</a>
                </div>

                <div class="lg:grid lg:grid-cols-[2fr_3fr] lg:gap-10">

                    <div class="flex flex-col items-center">

                        <div class="w-full relative overflow-hidden bg-white rounded-xl shadow-lg p-6 lg:p-0 lg:shadow-none lg:rounded-none lg:bg-transparent">

                            <div id="image-carousel-mobile"
                                class="lg:hidden flex overflow-x-scroll snap-x snap-mandatory scroll-smooth"
                                style="scroll-snap-type: x mandatory;">
                                @foreach ($record->files as $index => $image)
                                <div class="flex-shrink-0 w-full snap-center h-[300px] flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $image->file_path) }}"
                                        alt="Imagen {{ $index + 1 }}"
                                        class="max-h-80 object-contain w-full transition-opacity duration-300">
                                </div>
                                @endforeach
                            </div>

                            <div
                                class="hidden lg:flex justify-center items-center w-full h-[300px] max-w-lg lg:max-w-none mb-4 bg-white rounded-xl shadow-lg p-6">
                                <img id="main-product-image-desktop" src="{{ asset('storage/' . $record->files->first()->file_path) }}"
                                    alt="{{ $record->name }}"
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

                            <div id="carousel-dots-mobile" class="lg:hidden absolute bottom-2 left-0 right-0 flex justify-center space-x-2 p-2">
                                @foreach ($record->files as $index => $image)
                                <span class="dot-indicator w-2 h-2 rounded-full bg-gray-400 transition-colors duration-300 {{ $index === 0 ? '!bg-primary' : '' }}"
                                    data-index="{{ $index }}"></span>
                                @endforeach
                            </div>

                        </div>

                        <div id="desktop-thumbnails" class="hidden lg:flex justify-center space-x-3 w-full mt-2">
                            @foreach ($record->files as $index => $thumb)
                                <button
                                    class="thumb-selector w-20 h-20 border-2 shadow-lg rounded-lg p-1 bg-white hover:border-primary transition-colors {{ $index === 0 ? 'border-primary' : 'border-gray-300' }}"
                                    data-image-src="{{ asset('storage/' . $thumb->file_path) }}">
                                    <img src="{{ asset('storage/' . $thumb->file_path) }}" alt="Miniatura {{ $index + 1 }}"
                                        class="w-full h-full object-contain">
                                </button>
                            @endforeach
                        </div>
                    </div>


                    <div class="mt-8 lg:mt-0 bg-transparent tablet:p-6 rounded-xl">
                        <h1 class="text-title">{{ $record->name }}</h1>
                        <p class="text-description mb-3">{{ $record->subtitle }}</p>

                        <div class="mb-4">
                            <h2 class="text-subtitle !text-primary mb-2 uppercase">
                                DESCRIPCIÓN
                            </h2>
                            <div class="text-content">{!! $record->description !!}</div>
                        </div>

                        <div class="mb-8">
                            <h2 class="text-subtitle !text-primary mb-2 uppercase">
                                Especificaciones</h2>
                            <div class="space-y-2 text-gray-700">
                                <p class="flex gap-1 items-center">
                                    <strong class="uppercase text-sm block sm:inline">TIPO:</strong>
                                    <span class="sm:ml-1">{{ $record->type->name }}</span>
                                </p>
                                <p class="flex gap-1 items-center">
                                    <strong class="uppercase text-sm block sm:inline">PRESENTACIÓN:</strong>
                                    <span class="sm:ml-1">{{ $record->presentation }}</span>
                                </p>
                                <p class="flex gap-1 items-center">
                                    <strong class="uppercase text-sm block sm:inline">ESPECIALIDAD:</strong>
                                    <span class="sm:ml-1">{{ $record->specialty->name }}</span>
                                </p>
                            </div>
                        </div>

                        <div
                            class="border-t border-gray-400 pt-4 flex flex-col sm:flex-row gap-2 items-center justify-between space-y-4 sm:space-y-0">
                            <div class="flex gap-3 mb-3 tablet:mb-3">
                                <a href="{{ $record->phone }}"
                                    target="_blank"
                                    class="flex items-center w-full sm:w-auto justify-center transition-colors text-lg max-w-max min-w-[40px]">
                                    <img src="/icons/wsp-transparent.png" alt="WhatsApp Icon" class="w-10 h-10">

                                </a>

                                <a href="{{ $record->phone }}" target="_blank"
                                    class="flex items-center w-full sm:w-auto justify-center bg-primary text-white font-semibold py-1 px-6 rounded-full shadow-lg hover:bg-primary-dark transition-colors text-lg min-w-max">
                                    Más información
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div
                                class="pt-6 border-t border-gray-400 tablet:border-t-0 w-full tablet:pt-0 flex items-center justify-center sm:justify-end text-gray-700">
                                <span class="mr-3 font-semibold text-sm">Síguenos en:</span>
                                <div class="flex space-x-3">
                                    <div class="flex space-x-4">
                                        <a  href="https://www.facebook.com/profile.php?id=61563440202360" target="_blank" aria-label="Facebook"
                                            class="text-gray-600 hover:text-blue-600 transition-colors">
                                            <img src="/icons/fb.svg" alt="icono Facebook" class="w-5 h-5">
                                        </a>
                                        {{-- <a href="#" aria-label="TikTok"
                                            class="text-gray-600 hover:text-black transition-colors">
                                            <img src="/icons/tiktok.svg" alt="icono TikTok" class="w-5 h-5">
                                        </a> --}}
                                        <a href="https://www.instagram.com/drogueriajaen?igsh=b2dxMGxpZjd3YXQw" target="_blank" aria-label="Instagram"
                                            class="text-gray-600 hover:text-pink-600 transition-colors">
                                            <img src="/icons/instagram.svg" alt="icono Instagram" class="w-5 h-5">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('products.partials.products-featured')
@endsection

@push('scripts')
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
                mainImageDesktop.style.opacity = '0';
                setTimeout(() => {
                    mainImageDesktop.src = newSrc;
                    mainImageDesktop.style.opacity = '1';
                }, 100);
                thumbSelectors.forEach(t => t.classList.remove('border-primary'));
                thumbSelectors.forEach(t => t.classList.add('border-gray-300'));
                this.classList.remove('border-gray-300');
                this.classList.add('border-primary');
            });
        });
    }

    // --- Lógica para Mobile (Dots) ---
    if (carouselMobile && dotsMobile.length > 0) {
        const updateDots = () => {
            const scrollLeft = carouselMobile.scrollLeft;
            const imageWidth = carouselMobile.offsetWidth;
            const activeIndex = Math.round(scrollLeft / imageWidth);
            dotsMobile.forEach((dot, index) => {
                dot.classList.remove('!bg-primary', 'bg-gray-400');
                dot.classList.add(index === activeIndex ? '!bg-primary' : 'bg-gray-400');
            });
        };
        carouselMobile.addEventListener('scroll', updateDots);
        dotsMobile.forEach(dot => {
            dot.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                const imageWidth = carouselMobile.offsetWidth;
                carouselMobile.scrollTo({ left: index * imageWidth, behavior: 'smooth' });
            });
        });
        updateDots();
    }

    // --- 🔍 Efecto Zoom (Lupa) ---
  const img = document.getElementById("main-product-image-desktop");
  if (!img) return;

  // ✅ Envolver la imagen en un contenedor si no existe
  if (!img.parentElement.id.includes("main-product-image-desktop-container")) {
    const wrapper = document.createElement("div");
    wrapper.id = "main-product-image-desktop-container";
    wrapper.classList.add("w-full");
    img.parentNode.insertBefore(wrapper, img);
    wrapper.appendChild(img);
  }

  const container = document.getElementById("main-product-image-desktop-container");

  container.addEventListener("mousemove", (e) => {
    const rect = container.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;
    img.style.transformOrigin = `${x}% ${y}%`;
    img.style.transform = "scale(2)"; // 🔍 Ajusta el nivel de zoom aquí
  });

  container.addEventListener("mouseleave", () => {
    img.style.transformOrigin = "center center";
    img.style.transform = "scale(1)";
  });
});
</script>
@endpush
<style scoped>
    #main-product-image-desktop-container {
    position: relative;
    overflow: hidden;
    cursor: zoom-in;
    }

    #main-product-image-desktop {
    transition: transform 0.25s ease-out;
    transform-origin: center center;
    }
</style>
