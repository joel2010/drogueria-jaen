{{-- resources/views/components/benefits-section.blade.php --}}
@php
$content = [
'title' => 'Beneficios de trabajar con Droguería Jaén',
'subtitle' => 'Al elegirnos, nuestros clientes obtienen:',
'benefits' => [
[
'id' => 1,
'iconSrc' => '/icons/benefits1.svg',
'title' => 'Tranquilidad y confianza',
'description' => 'Gracias a un abastecimiento oportuno y seguro.'
],
[
'id' => 2,
'iconSrc' => '/icons/benefits2.svg',
'title' => 'Atención personalizada',
'description' => 'Con soluciones adaptadas a cada empresa o institución.'
],
[
'id' => 3,
'iconSrc' => '/icons/benefits3.svg',
'title' => 'Seguridad y respaldo',
'description' => 'En cada producto y servicio.'
],
[
'id' => 4,
'iconSrc' => '/icons/benefits4.svg',
'title' => 'Soluciones integrales',
'description' => 'Convirtiéndonos en el aliado estratégico ideal para tu negocio.'
],
]
];
@endphp

<section class="max-width mx-auto px-4 py-12 text-center relative">
    {{-- Título --}}
    <div class="mb-8" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            {{ $content['title'] }}
        </h2>
        <p class="text-gray-600">
            {{ $content['subtitle'] }}
        </p>
    </div>

    {{-- Desktop: grid --}}
    <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
        @foreach ($content['benefits'] as $i => $benefit)
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-start text-center h-full"
            data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}" data-aos-duration="900">
            <div class="mb-4">
                <img src="{{ $benefit['iconSrc'] }}" alt="icono {{ strtolower($benefit['title']) }}" class="w-14 h-14">
            </div>
            <h3 class="font-bold text-lg text-gray-800 mb-2">
                {{ $benefit['title'] }}
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                {{ $benefit['description'] }}
            </p>
        </div>
        @endforeach
    </div>

    {{-- Mobile: carrusel --}}
    <div class="md:hidden relative max-w-6xl mx-auto overflow-hidden h-[220px]">
        {{-- Botones --}}
        <button id="benefitsPrevBtn"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300"
            aria-label="Anterior">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button id="benefitsNextBtn"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300"
            aria-label="Siguiente">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        {{-- Track --}}
        <div class="carousel-track flex transition-transform duration-700 ease-in-out" id="benefitsCarouselTrack">
            @foreach ($content['benefits'] as $i => $benefit)
            <div class="carousel-slide flex-shrink-0 w-full !h-auto !items-stretch" id="slide-benefit"
                data-aos="fade-up" data-aos-delay="{{ $i * 200 }}" data-aos-duration="900">
                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center text-center h-full mx-4 w-full">
                    <div class="mb-4">
                        <img src="{{ $benefit['iconSrc'] }}" alt="icono {{ strtolower($benefit['title']) }}"
                            class="w-14 h-14">
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">
                        {{ $benefit['title'] }}
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                        {{ $benefit['description'] }}
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
    const track = document.getElementById("benefitsCarouselTrack");
    const slides = document.querySelectorAll("#slide-benefit");
    const prevBtn = document.getElementById("benefitsPrevBtn");
    const nextBtn = document.getElementById("benefitsNextBtn");

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
