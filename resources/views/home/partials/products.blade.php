@php


$content = [
    'title' => 'Nuestros Productos',
    'subtitle' => 'Descubre nuestra amplia gama de productos de alta calidad',
];

$background_color = $background_color ?? 'bg-[#00E5A1]';
$title_text = $title_text ?? $content['title'];
$title_color = $title_color ?? 'text-title2';
$bg_button = $bg_button ?? 'bg-primary';
$text_button = $text_button ?? 'text-white';
@endphp

<section class="{{ $background_color }} py-6 tablet:py-8 text-center">
    <div class="mx-auto px-4 max-width">
        <div class="mb-6">
            <h2 class="{{ $title_color }} text-title2">
                {{ $title_text }}
            </h2>
            <p class=" {{ $title_color }} text-subtitle !font-normal">
                {{ $content['subtitle'] }}
            </p>
        </div>

        {{-- Carrusel en móvil --}}
        <div class="glide desktop:hidden relative">
            <!-- Track -->
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($mainProducts as $index => $product)
                    <li class="glide__slide flex-shrink-0 w-[49%]">
                        <x-product-card :product="$product" :index="$index" />
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Controles -->
            <div class="glide__arrows" data-glide-el="controls">
                <button data-glide-dir="<"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md border border-primary transition-all hover:scale-110">
                    <img src="/icons/button-left.svg" class="w-4 h-4" alt="Anterior">
                </button>
                <button data-glide-dir=">"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md border border-primary transition-all hover:scale-110">
                    <img src="/icons/button-right.svg" class="w-4 h-4" alt="Siguiente">
                </button>
            </div>
        </div>


        {{-- Carrusel en desktop --}}
        <div class="glide hidden desktop:block relative">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($mainProducts as $index => $product)
                    <li class="glide__slide flex-shrink-0 w-[18%] min-w-[220px]">
                        <x-product-card :product="$product" :index="$index" />
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button data-glide-dir="<"
                    class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md border border-primary hover:scale-110">
                    <img src="/icons/button-left.svg" class="w-5 h-5" alt="Anterior">
                </button>
                <button data-glide-dir=">"
                    class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md border border-primary hover:scale-110">
                    <img src="/icons/button-right.svg" class="w-5 h-5" alt="Siguiente">
                </button>
            </div>
        </div>


        <div class="mt-8">
            <a href="/productos"
                class="{{ $bg_button }} cursor-pointer {{ $text_button }} font-semibold py-1 px-4 tablet:py-2 tablet:px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
                Ver más productos
            </a>
        </div>
    </div>
</section>

<script>
    function scrollCarousel(id, direction) {
        const carousel = document.getElementById(id);
        carousel.scrollBy({
            left: direction * (carousel.offsetWidth * 0.8),
            behavior: 'smooth'
        });
    }
</script>
