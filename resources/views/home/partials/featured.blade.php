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

<section class="mx-auto tablet:py-8 relative max-width">
    {{-- Versión escritorio --}}
    <div class="hidden tablet:flex justify-between gap-8 items-stretch mx-auto">
        @foreach($features as $index => $feature)
        <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1200" data-aos-offset="150"
            data-aos-delay="{{ $index * 200 }}" class="h-auto">
            <div
                class="card-hover p-4 flex flex-col items-center text-center h-full tablet:max-w-xs w-full !bg-[#FAFAFA] ">
                <div class="mb-4">
                    <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}"
                        class="w-14 h-14">
                </div>
                <h3 class="text-title text-gray-800 mb-2">
                    {{ $feature['title'] }}
                </h3>
                <p class="text-description2 leading-relaxed mb-auto">
                    {{ $feature['description'] }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="tablet:hidden relative max-w-desktop mx-auto overflow-hidden py-6
            px-4 tablet:py-4">
        <button id="featuredPrevBtn"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
            aria-label="Anterior">
            <img src="/icons/button-left.svg" alt="Anterior" class="w-4 h-4">
        </button>
        <button id="featuredNextBtn"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
            aria-label="Siguiente">
            <img src="/icons/button-right.svg" alt="Siguiente" class="w-4 h-4">
        </button>
        <div class="w-full h-full">
            <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
                @foreach($features as $index => $feature)
                <div class="carousel-slide flex-shrink-0 w-[300px] !h-auto !items-stretch" id="slide-featured">
                    <div class="!bg-[#FAFAFA] rounded-lg shadow-md p-4 flex flex-col items-center text-center h-full mx-4"
                        data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1200"
                        data-aos-offset="150" data-aos-delay="{{ $index * 200 }}">
                        <div class="mb-4">
                            <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}"
                                class="w-14 h-14">
                        </div>
                        <h3 class="text-title mb-2">
                            {{ $feature['title'] }}
                        </h3>
                        <p class="text-description leading-relaxed mb-auto">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

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
