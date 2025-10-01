{{-- resources/views/components/about-section.blade.php --}}
@php
$content = [
'title' => 'Nosotros',
'paragraphs' => [
'En Droguería Jaén somos una empresa del rubro salud dedicada a ofrecer soluciones confiables e integrales para el
bienestar de las personas y el fortalecimiento del sector sanitario.',
'Nos especializamos en la venta de productos farmacéuticos, equipamiento médico y hospitalario, dispositivos médicos y
contamos con un servicio seguro de almacenamiento que garantiza la conservación de los productos e insumos bajo los más
altos estándares de calidad.'
],
'imageSrc' => '/images/home-about.png',
'imageAlt' => 'Persona con tablet en droguería',
'features' => [
[
'iconSrc' => '/icons/mission.svg',
'title' => 'Misión',
'description' => 'Brindar soluciones integrales en salud mediante medicamentos, dispositivos, equipamiento médico,
almacenamiento especializado y cuidados de enfermería en casa, garantizando calidad, continuidad y confianza para
instituciones y familias.'
],
[
'iconSrc' => '/icons/vision.svg',
'title' => 'Visión',
'description' => 'Ser reconocidos como la empresa líder e integral en salud, destacando por nuestra confiabilidad,
innovación y compromiso humano, y consolidándonos como el aliado primordial de instituciones y hogares.'
],
[
'iconSrc' => '/icons/philosophy.svg',
'title' => 'Filosofía',
'description' => 'Creemos que la salud es el bien más valioso. Nuestra filosofía se basa en la integralidad, confianza y
compromiso humano, ofreciendo un servicio completo que asegura bienestar y tranquilidad a cada cliente.'
],
]
];
@endphp

<section class="mx-auto px-4 desktop:px-0 max-width text-justify pb-6 tablet:pb-10">
    <div class="flex flex-col tablet:flex-row items-start tablet:items-stretch gap-9">

        {{-- Texto --}}
        <div class="w-full flex-1 order-1 tablet:order-2">
            <h2 class="text-title !text-primary mb-1" data-aos="fade-up" data-aos-duration="1200"
                data-aos-easing="ease-in-out-cubic">
                {{ $content['title'] }}
            </h2>

            @foreach($content['paragraphs'] as $index => $paragraph)
            <p class="text-description2 mb-4  tablet:mb-4" data-aos="fade-up" data-aos-delay="{{ 100 + $index * 150 }}"
                data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
                {{ $paragraph }}
            </p>
            @endforeach

            {{-- Imagen móvil --}}
            <div class="w-full order-2 tablet:hidden my-4" data-aos="fade-up" data-aos-delay="400"
                data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
                <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
                    class="rounded-lg object-cover w-full h-[300px]">
            </div>

            {{-- Carrusel móvil --}}
            <div class="md:hidden relative max-w-desktop mx-auto overflow-hidden carousel-container !h-auto"
                data-aos="fade-up" data-aos-delay="500" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
                {{-- Botones --}}
                <button id="prevBtn"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1  rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
                    aria-label="Anterior">
                    <img src="/icons/button-left.svg" alt="Anterior" class="w-4 h-4">
                </button>

                <button id="nextBtn"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
                    aria-label="Siguiente">
                    <img src="/icons/button-right.svg" alt="Siguiente" class="w-4 h-4">
                </button>

                {{-- Track --}}
                <div class="carousel-track" id="carouselTrackAbout">
                    @foreach($content['features'] as $featureIndex => $feature)
                    <div class="carousel-slide" id="carousel-slide-about" data-aos="fade-up"
                        data-aos-delay="{{ 600 + $featureIndex * 150 }}" data-aos-duration="1200"
                        data-aos-easing="ease-in-out-cubic">
                        <div class="flex flex-col items-center text-center px-6 mx-1 tablet:mx-0">
                            <div class="flex items-center mb-4">
                                <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}"
                                    class="min-w-[50px] h-[50px] mr-2">
                                <h3 class="text-title">{{ $feature['title'] }}</h3>
                            </div>
                            <p class="text-description2">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Versión escritorio --}}
            <div class="hidden tablet:block space-y-6 order-3 desktop:order-4 mt-5">
                @foreach($content['features'] as $featureIndex => $item)
                <div class="flex items-start" data-aos="fade-up" data-aos-delay="{{ 700 + $featureIndex * 150 }}"
                    data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
                    <div class="flex items-center mb-2">
                        <img src="{{ $item['iconSrc'] }}" alt="icono {{ strtolower($item['title']) }}"
                            class="min-w-[50px] h-[50px] mr-2">
                    </div>
                    <div>
                        <h3 class="text-title">{{ $item['title'] }}</h3>
                        <p class="text-description">{{ $item['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Botón --}}
            <div class="space-y-6 order-3 desktop:order-4 flex justify-center desktop:justify-start" data-aos="fade-up"
                data-aos-delay="1100" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
                <a href="/nosotros"
                    class="w-full cursor-pointer bg-primary mx-auto mt-2 tablet:mx-0 text-white font-semibold py-1 px-5 tablet:py-2 tablet:px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max tablet:ml-15 tablet:mt-4">
                    Conócenos
                </a>
            </div>
        </div>

        {{-- Imagen escritorio --}}
        <div class="hidden desktop:block order-2 desktop:order-1" data-aos="fade-left" data-aos-delay="1200"
            data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
            <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}" class="rounded-lg shadow-[25px]"
                width="300">
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("carouselTrackAbout");
    const slides = document.querySelectorAll("#carousel-slide-about");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

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
