@extends('layout.app')

@section('content')

<x-HeroSection class="h-[200px]" image="/images/service-banner.jpg" title="Nuestros Servicios" showWspButton="true" :limitHeight="true"/>

<section class="mx-auto px-4 max-width py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @php
        $services = [
        [
        'title' => 'Abastecimiento a instituciones de salud',
        'description' =>
        'Atendemos a clínicas, hospitales, farmacias, laboratorios y empresas de salud ocupacional, garantizando un
        abastecimiento confiable, productos de alta calidad y almacenamiento seguro que aseguran la continuidad en la
        atención y el cumplimiento de estándares.',
        'image' => '/images/service1.jpg',
        ],
        [
        'title' => 'Venta de productos farmacéuticos',
        'description' =>
        'Ofrecemos productos de calidad, respaldados por una cadena de suministro para la entrega oportuna.',
        'image' => '/images/services2.png',
        ],
        [
        'title' => 'Equipamiento y dispositivos médicos',
        'description' =>
        'Brindamos equipamiento hospitalario y dispositivos médicos con garantía.',
        'image' => '/images/services3.png',
        ],
        [
        'title' => 'Almacenamiento',
        'description' =>
        'Contamos con infraestructura que asegura la conservación óptima de productos e insumos bajo los más altos
        estándares de calidad.',
        'image' => '/images/services4.png',
        ],
        [
        'title' => 'Cuidados de enfermería en casa',
        'description' =>
        'Apoyamos directamente a pacientes y familias con un servicio humano y cercano, ofreciendo confianza, comodidad
        y atención personalizada en el hogar.',
        'image' => '/images/services5.png',
        ],
        ];
        @endphp

        @foreach ($services as $index => $service)
            {{-- Contenedor externo solo para AOS --}}
            <div class="{{ $index === 0 ? 'md:col-span-2' : '' }}"
                data-aos="fade-up" data-aos-duration="1000">

                <div class="card-service bg-primary overflow-hidden shadow-lg hover:shadow-xl
                            transition-all duration-500 transform hover:-translate-y-2 h-full rounded-[20px]">

                    <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="w-full h-[230px] tablet:h-48 object-cover">

                    <div class="bg-primary text-white p-6">
                        <h3 class="text-title text-center tablet:text-left mb-2 !text-white">{{ $service['title'] }}</h3>
                        <p class="text-description text-center tablet:text-left !text-white leading-relaxed">
                            {{ $service['description'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>

<section class="bg-gray-100 py-12 px-4">
    <div class="max-w-[500px] mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="200">
            <img src="/icons/health-shield.svg" alt="icono salud" class="w-[76px] h-[76p]">
        </div>

        <h2 class="text-title mb-4" data-aos="fade-up" data-aos-delay="400">
            Reunimos en un solo lugar todo lo que tu institución o familia necesita:
        </h2>

        <p class="text-secondary !font-normal leading-relaxed" data-aos="fade-up" data-aos-delay="600">
            Abastecimiento confiable, productos farmacéuticos, equipamiento médico,
            almacenamiento seguro y cuidados en casa.
            Esto nos convierte en un aliado estratégico que ofrece soluciones integrales y seguras en salud.
        </p>
    </div>
</section>

@include('home.partials.contact')


@endsection
