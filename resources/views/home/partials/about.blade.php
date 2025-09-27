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

<section class="mx-auto px-4 xl:px-0 max-width text-justify pb-10">
    <div class="flex flex-col lg:flex-row items-start lg:items-stretch gap-12">

        {{-- Texto --}}
        <div class="w-full flex-1 order-1 lg:order-2">
            <h2 class="text-3xl font-bold text-primary mb-1"
                data-aos="fade-up"
                data-aos-duration="1200"
                data-aos-easing="ease-in-out-cubic">
                {{ $content['title'] }}
            </h2>

            @foreach($content['paragraphs'] as $index => $paragraph)
                <p class="text-gray-600 mb-2"
                   data-aos="fade-up"
                   data-aos-delay="{{ 100 + $index * 150 }}"
                   data-aos-duration="1200"
                   data-aos-easing="ease-in-out-cubic">
                    {{ $paragraph }}
                </p>
            @endforeach

            {{-- Imagen móvil --}}
            <div class="w-full order-2 lg:hidden my-4"
                 data-aos="fade-up"
                 data-aos-delay="400"
                 data-aos-duration="1200"
                 data-aos-easing="ease-in-out-cubic">
                <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
                     class="rounded-lg object-cover w-full h-[300px]">
            </div>

            {{-- Carrusel móvil --}}
            <div class="md:hidden relative max-w-6xl mx-auto overflow-hidden h-[220px] carousel-container"
                 data-aos="fade-up"
                 data-aos-delay="500"
                 data-aos-duration="1200"
                 data-aos-easing="ease-in-out-cubic">
                {{-- Botones --}}
                <button id="prevBtn"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-1 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300 border-[1px] border-primary border-solid"
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
                        <div class="carousel-slide"
                             id="carousel-slide-about"
                             data-aos="fade-up"
                             data-aos-delay="{{ 600 + $featureIndex * 150 }}"
                             data-aos-duration="1200"
                             data-aos-easing="ease-in-out-cubic">
                            <div class="flex flex-col items-center text-center px-6">
                                <div class="flex items-center mb-4">
                                    <img src="{{ $feature['iconSrc'] }}" alt="icono {{ strtolower($feature['title']) }}"
                                         class="min-w-[50px] h-[50px] mr-2">
                                    <h3 class="font-semibold text-xl text-gray-800">{{ $feature['title'] }}</h3>
                                </div>
                                <p class="text-gray-600 text-sm">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Versión escritorio --}}
            <div class="hidden md:block space-y-6 order-3 lg:order-4 mt-8">
                @foreach($content['features'] as $featureIndex => $item)
                    <div class="flex items-start"
                         data-aos="fade-up"
                         data-aos-delay="{{ 700 + $featureIndex * 150 }}"
                         data-aos-duration="1200"
                         data-aos-easing="ease-in-out-cubic">
                        <div class="flex items-center mb-2">
                            <img src="{{ $item['iconSrc'] }}" alt="icono {{ strtolower($item['title']) }}"
                                 class="min-w-[50px] h-[50px] mr-2">
                        </div>
                        <div>
                            <h3 class="font-semibold text-xl text-gray-800">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Botón --}}
            <div class="space-y-6 order-3 lg:order-4 flex justify-center lg:justify-start"
                 data-aos="fade-up"
                 data-aos-delay="1100"
                 data-aos-duration="1200"
                 data-aos-easing="ease-in-out-cubic">
                <button type="button"
                        class="w-full bg-primary mx-auto md:mx-0 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max md:ml-15 md:mt-8">
                    Conócenos
                </button>
            </div>
        </div>

        {{-- Imagen escritorio --}}
        <div class="hidden lg:block order-2 lg:order-1"
             data-aos="fade-left"
             data-aos-delay="1200"
             data-aos-duration="1200"
             data-aos-easing="ease-in-out-cubic">
            <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}" class="rounded-lg shadow-lg"
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
