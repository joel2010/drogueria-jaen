{{-- resources/views/components/featured-section.blade.php --}}
@php
$features = [
[
'id' => 1,
'iconSrc' => '/icons/specification.svg',
'title' => 'Nos especializamos',
'description' => 'Venta de productos farmacéuticos, equipamiento médico y hospitalario, dispositivos médicos'
],
[
'id' => 2,
'iconSrc' => '/icons/partner.svg',
'title' => 'Aliado estratégico',
'description' => 'Soluciones integrales y seguras que generan confianza y respaldo constante.'
],
[
'id' => 3,
'iconSrc' => '/icons/card_home.svg',
'title' => 'Cuidado en casa',
'description' => 'Atención personalizada y especializada en enfermería en el hogar.'
],
];
@endphp

<section class="mx-auto py-12 relative max-width">
    {{-- Versión escritorio --}}
    <div class="hidden md:flex justify-between gap-8 items-stretch mx-auto">
        @foreach($features as $index => $feature)
        <div class="card-hover p-6 flex flex-col items-center text-center h-auto md:max-w-xs w-full" data-aos="fade-up"
            data-aos-easing="ease-out-cubic" data-aos-duration="1200" data-aos-offset="150"
            data-aos-delay="{{ $index * 200 }}">
            <div class="mb-4">
                <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}" class="w-14 h-14">
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                {{ $feature['title'] }}
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                {{ $feature['description'] }}
            </p>
        </div>
        @endforeach
    </div>

    {{-- Versión móvil con carrusel --}}
    <div class="md:hidden relative max-w-6xl mx-auto overflow-hidden h-[260px]">
        {{-- Botones --}}
        <button id="featuredPrevBtn"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300"
            aria-label="Anterior">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button id="featuredNextBtn"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300"
            aria-label="Siguiente">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        {{-- Track de slides --}}
        <div class="carousel-track flex transition-transform duration-700 ease-in-out">
            @foreach($features as $index => $feature)
            <div class="carousel-slide flex-shrink-0 w-full !h-auto !items-stretch" id="slide-featured">
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center h-full mx-4"
                    data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1200" data-aos-offset="150"
                    data-aos-delay="{{ $index * 200 }}">
                    <div class="mb-4">
                        <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}"
                            class="w-14 h-14">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        {{ $feature['title'] }}
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                        {{ $feature['description'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Script carrusel --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".carousel-track");
    const slides = document.querySelectorAll("#slide-featured");
    const prevBtn = document.getElementById("featuredPrevBtn");
    const nextBtn = document.getElementById("featuredNextBtn");

    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        track.style.transform = `translateX(${offset}%)`;
    }

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateCarousel();
    });

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel();
    });

});
</script>
