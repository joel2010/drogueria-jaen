<section class="bg-primary py-6 tablet:py-8 text-center">
    <div class="mx-auto px-4 max-width">
        {{-- Encabezado --}}
        <div class="mb-6">
            <h2 class="text-title2 !text-white">
                Productos Destacados
            </h2>
            <p class="text-subtitle !font-normal !text-white">
                Descubre nuestra amplia gama de productos de alta calidad
            </p>
        </div>

        {{-- Carrusel en móvil --}}
        <div class="desktop:hidden relative">
            <div id="carousel"
                class="flex overflow-x-auto relative w-full h-full snap-x snap-mandatory scroll-smooth gap-2 overflow-y-hidden">
                @foreach ($mainProducts as $index => $product)
                <div class="flex-shrink-0 snap-center gap-2 w-[49%]">
                    <x-product-card :product="$product" class="mx-2" :index="$index" />
                </div>
                @endforeach
            </div>
            <button onclick="scrollCarousel(-1)"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
                aria-label="Anterior">
                <img src="/icons/button-left.svg" alt="Anterior" class="w-4 h-4">
            </button>
            <button onclick="scrollCarousel(1)"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
                aria-label="Siguiente">
                <img src="/icons/button-right.svg" alt="Siguiente" class="w-4 h-4">
        </div>

        {{-- Grid en escritorio --}}
        <div class="hidden desktop:grid  desktop:grid-cols-5 gap-6 justify-center">
            @foreach ($mainProducts as $index => $product)
            <x-product-card :product="$product" :index="$index" />
            @endforeach
        </div>

        {{-- Botón Ver más --}}
        <div class="mt-8">
            <a href="/productos"
                class="bg-white text-primary font-semibold py-1 px-4 tablet:py-2 tablet:px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
                Ver más productos
            </a>
        </div>
    </div>
</section>

{{-- Script simple para el scroll del carrusel --}}
<script>
    function scrollCarousel(direction) {
        const carousel = document.getElementById('carousel');
        carousel.scrollBy({
            left: direction * carousel.offsetWidth,
            behavior: 'smooth'
        });
    }
</script>
