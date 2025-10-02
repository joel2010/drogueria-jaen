@php
$content = [
    'title' => 'Nuestros Productos',
    'subtitle' => 'Descubre nuestra amplia gama de productos de alta calidad',
    'products' => [
        [
            'id' => 1,
            'imageSrc' => '/images/product/product1.png',
            'name' => 'Transpore 3M 1527-1',
            'description' => 'Cinta médica hipoalergénica',
        ],
        [
            'id' => 2,
            'imageSrc' => '/images/product/product2.png',
            'name' => 'Venda Elástica',
            'description' => 'Compresión y soporte para lesiones',
        ],
        [
            'id' => 3,
            'imageSrc' => '/images/product/product3.png',
            'name' => 'Gorro de enfermera',
            'description' => 'Material Tela no tejida SPP',
        ],
        [
            'id' => 4,
            'imageSrc' => '/images/product/product4.png',
            'name' => 'Transpore 3M 1527-3',
            'description' => 'Cinta médica hipoalergénica',
        ],
        [
            'id' => 5,
            'imageSrc' => '/images/product/product5.png',
            'name' => 'Steri Strip 1546',
            'description' => 'Parche para cerrar heridas',
        ],
        // Agrego más productos de ejemplo
        [
            'id' => 6,
            'imageSrc' => '/images/product/product1.png',
            'name' => 'Alcohol Medicinal',
            'description' => 'Desinfectante de uso médico',
        ],
        [
            'id' => 7,
            'imageSrc' => '/images/product/product2.png',
            'name' => 'Guantes de Látex',
            'description' => 'Protección y seguridad en procedimientos',
        ],
        [
            'id' => 8,
            'imageSrc' => '/images/product/product3.png',
            'name' => 'Mascarilla',
            'description' => 'Filtro de 3 capas de protección',
        ],
        [
            'id' => 9,
            'imageSrc' => '/images/product/product4.png',
            'name' => 'Termómetro Digital',
            'description' => 'Medición precisa y rápida',
        ],
        [
            'id' => 10,
            'imageSrc' => '/images/product/product5.png',
            'name' => 'Jeringa 5ml',
            'description' => 'Uso médico desechable',
        ],
    ],
];
@endphp

<section class="bg-[#00E5A1] py-6 tablet:py-8 text-center">
    <div class="mx-auto px-4 max-width">
        {{-- Encabezado --}}
        <div class="mb-6">
            <h2 class="text-title2">
                {{ $content['title'] }}
            </h2>
            <p class="text-subtitle !font-normal">
                {{ $content['subtitle'] }}
            </p>
        </div>

        {{-- Carrusel en móvil --}}
<div class="desktop:hidden relative"> <div id="carousel" class="flex overflow-x-auto relative w-full h-full snap-x snap-mandatory scroll-smooth gap-2 overflow-y-hidden"> @foreach ($content['products'] as $index => $product) <div class="flex-shrink-0 snap-center gap-2 w-[49%]"> <x-product-card :product="$product" class="mx-2" :index="$index" /> </div> @endforeach </div> <button onclick="scrollCarousel(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid" aria-label="Anterior"> <img src="/icons/button-left.svg" alt="Anterior" class="w-4 h-4"> </button> <button onclick="scrollCarousel(1)" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid" aria-label="Siguiente"> <img src="/icons/button-right.svg" alt="Siguiente" class="w-4 h-4"> </div>

        {{-- Carrusel en desktop --}}
        <div class="hidden desktop:block relative">
            <div id="carousel-desktop"
                class="flex overflow-x-auto overflow-y-hidden scroll-hidden scroll-smooth gap-6 snap-x snap-mandatory">
                @foreach ($content['products'] as $index => $product)
                    <div class="flex-shrink-0 snap-start w-[18%] min-w-[220px]">
                        <x-product-card :product="$product" :index="$index" />
                    </div>
                @endforeach
            </div>
            <button onclick="scrollCarousel('carousel-desktop', -1)"
                class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border border-primary"
                aria-label="Anterior">
                <img src="/icons/button-left.svg" alt="Anterior" class="w-5 h-5">
            </button>
            <button onclick="scrollCarousel('carousel-desktop', 1)"
                class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border border-primary"
                aria-label="Siguiente">
                <img src="/icons/button-right.svg" alt="Siguiente" class="w-5 h-5">
            </button>
        </div>

        {{-- Botón Ver más --}}
        <div class="mt-8">
            <a href="/productos"
                class="bg-primary cursor-pointer text-white font-semibold py-1 px-4 tablet:py-2 tablet:px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
                Ver más productos
            </a>
        </div>
    </div>
</section>

{{-- Script simple para el scroll del carrusel --}}
<script>
    function scrollCarousel(id, direction) {
        const carousel = document.getElementById(id);
        carousel.scrollBy({
            left: direction * (carousel.offsetWidth * 0.8),
            behavior: 'smooth'
        });
    }
</script>
