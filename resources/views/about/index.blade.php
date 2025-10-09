@extends('layout.app')

@section('content')

{{-- <home-section></home-section> --}}
<x-HeroSection image="/images/about-banner.png" title="¿Quiénes Somos?" showWspButton="true" :limitHeight="true"/>

@php
$mission = [
'icon' => '/icons/mision2.svg',
'title' => 'Misión',
'text' => 'Brindar soluciones integrales en salud mediante medicamentos, dispositivos, equipamiento médico,
almacenamiento especializado y cuidados de enfermería en casa, garantizando calidad, continuidad y confianza para
instituciones y familias.',
];

$vision = [
'icon' => '/icons/vision2.svg',
'title' => 'Visión',
'text' => 'Ser reconocidos como la empresa líder e integral en salud, destacando por nuestra confiabilidad, innovación y
compromiso humano, y consolidándonos como el aliado primordial de instituciones y hogares.',
];

$filosofia = [
'icon' => '/icons/filosofia.svg',
'title' => 'Filosofía',
'text' => 'Creemos que la salud es el bien más valioso. Nuestra filosofía se basa en la integralidad, confianza y
compromiso humano, ofreciendo un servicio completo que asegura bienestar y tranquilidad a cada cliente.',
];
@endphp


<section class="bg-transparent mb-8 tablet:mb-14 tablet:mt-[-40px] relative z-10">
    <div class="max-w-desktop mx-auto">

        <div class="lg:grid lg:grid-cols-3 lg:gap-8">

            <div class="bg-primary text-white p-4 tablet:p-6 tablet:rounded-lg shadow-xl lg:col-span-1 mb-8 lg:mb-0">
                <h2 class="text-title2 pb-1  !text-[#00FFC3]">
                    Nosotros
                </h2>
                {{-- Textos largos omitidos por brevedad, pero usarían la misma estructura de <p> --}}
                <p class="mb-5 leading-relaxed text-description !text-white">
                    En Droguería Jaén somos una empresa del rubro salud dedicada a ofrecer soluciones confiables e
                    integrales para el bienestar de las personas y el fortalecimiento del sector sanitario.
                </p>
                <p class="mb-5 leading-relaxed text-description !text-white">
                    Nos especializamos en la venta de productos farmacéuticos, equipamiento médico y hospitalario,
                    dispositivos médicos y contamos con un servicio seguro de almacenamiento que garantiza la
                    conservación de los productos e insumos bajo los más altos estándares de calidad.
                </p>
                <p class="mb-5 leading-relaxed text-description !text-white">
                    Además, brindamos un servicio humano y cercano a través de nuestro servicio de cuidados de
                    enfermería en casa, orientados a acompañar a pacientes y familias en sus necesidades de salud con
                    profesionalismo, ética y calidez.
                </p>
                <p class="leading-relaxed text-description !text-white">
                    En Droguería Jaén creemos que la salud es un compromiso compartido. Por ello trabajamos con
                    responsabilidad, transparencia y vocación de servicio, para ser el aliado estratégico de hospitales,
                    clínicas, profesionales de la salud y familias que confían en nosotros.
                </p>
            </div>

            <div class="lg:col-span-2 space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 tablet:px-0">

                    @include('about.components.about-card', ['data' => $mission])

                    @include('about.components.about-card', ['data' => $vision])

                </div>

                <div class="space-y-6 px-4 tablet:px-0">

                    <div class="relative rounded-lg overflow-hidden shadow-xl">
                        <img src="/images/about-image.jpg" alt="Equipo de profesionales en Droguería Jaén"
                            class="w-full h-auto object-cover">
                    </div>

                    <div class="hidden md:block mb-0">
                        <h3 class="text-title mb-2">
                            Filosofía
                        </h3>
                        <p class="text-description leading-relaxed">
                            {{ $filosofia['text'] }}
                        </p>
                    </div>
                    <div class="md:hidden">

                        @include('about.components.about-card', ['data' => $filosofia])

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('home.partials.products')
@include('home.partials.contact')
@endsection
