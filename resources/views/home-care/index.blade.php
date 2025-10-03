@extends('layout.app')

@section('content')
@php
$features = [
[
'icon' => '/icons/nurse.svg',
'title' => 'Productos farmacéuticos en tu hogar',
'description' => 'Ponemos a tu alcance medicamentos y productos de calidad, con el respaldo y garantía que nos
caracteriza.',
],
[
'icon' => '/icons/medicine.svg',
'title' => 'Cuidados de enfermería domiciliaria',
'description' => 'Nuestro equipo de profesionales en salud acompaña a pacientes y familias en sus necesidades,
ofreciendo un servicio humano, cercano y seguro en la comodidad de su casa. De esta manera, nos aseguramos de que cada
paciente reciba la atención que merece, con profesionalismo, ética y calidez.',
],
];
$whatsappUrl = 'https://wa.me/XXXXXXXXXX?text=Me%20interesa%20el%20servicio%20de%20Cuidado%20en%20Casa';

$message = 'La salud también se vive en el hogar';
$separator = '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle cx="7.5" cy="7.5" r="7.5" fill="#00FFC3" />
</svg>
';
$items = [];

for ($i = 0; $i
< 10; $i++) { $items[]='<span class="flex items-center whitespace-nowrap">' . $message
    . ' <span class="ml-5 mr-3 text-[#00FFC3] text-[16px] font-bold">' . $separator . '</span></span>' ; }
    $marqueeContent=implode('', $items); @endphp


    <x-HeroSection image="/images/care-home-banner.jpg" title="Cuidado en Casa"
    showWspButton="true" />

<div class="w-full overflow-hidden bg-gray-50 border-y border-gray-200">
    <div class="marquee-wrapper flex">
        <div class="marquee-content flex py-1 text-title !text-[16px]  !text-primary">
            {!! $marqueeContent !!}
        </div>
        <div class="marquee-content flex py-1 text-title !text-[16px] !text-primary">
            {!! $marqueeContent !!}
        </div>
    </div>
</div>

<div class="p-6 tablet:p-10 desktop:p-16 bg-primary">
    <div
        class="desktop:grid desktop:grid-cols-2 desktop:gap-12 items-start bg-white max-w-desktop mx-auto p-6 tablet:p-10 rounded-3xl shadow-lg">

        <div class="order-2 desktop:order-1" data-aos="fade-right" data-aos-duration="1000"
            data-aos-easing="ease-out-cubic">

            <h2 class="text-title2 !text-primary mb-2 text-center tablet:text-left">
                Cuidado en casa
            </h2>

            <p class="text-description mb-3 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                En Droguería Jaén sabemos que la salud también se vive en el hogar. Por ello, ofrecemos un
                servicio especializado que brinda confianza, comodidad y atención personalizada a pacientes y
                familias.
            </p>

            @foreach ($features as $index => $feature)
            <div class="flex items-start mb-3 last:mb-0" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 150) }}">
                <div class="flex-shrink-0 mr-4">
                    <img src="{{ $feature['icon'] }}" alt="Icono de {{ $feature['title'] }}"
                        class="w-12 h-12 tablet:w-16 tablet:h-16 object-contain">
                </div>

                <div>
                    <h3 class="text-title mb-1">
                        {{ $feature['title'] }}
                    </h3>
                    <p class="text-description leading-relaxed">
                        {{ $feature['description'] }}
                    </p>
                </div>
            </div>
            @endforeach

            <div class="flex items-center justify-center gap-2 mx-auto mt-4" data-aos="zoom-in" data-aos-delay="700">
                <img src="/icons/wsp.svg" alt="WhatsApp Icon" class="w-10 h-10 mr-3">
                <a href="https://api.whatsapp.com/send?phone=51957390675&text=Hola%20Drogueria%20Jaen,%20quiero%20cotizar%20algunos%20productos%20que%20vi%20en%20su%20web,%20quisiera%20mas%20informacion"
                    target="_blank" rel="noopener noreferrer"
                    class="w-full bg-primary text-white font-semibold py-1 px-5 tablet:py-2 tablet:px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max">
                    Solicitar más información
                </a>
            </div>
        </div>

        {{-- Columna derecha: Imagen --}}
        <div class="order-1 desktop:order-2 mt-6 desktop:mt-0" data-aos="fade-left" data-aos-duration="1000"
            data-aos-easing="ease-out-cubic">
            <img src="/images/cuidado-en-casa.png" alt="Enfermera sonriendo y asistiendo a un paciente en casa"
                class="w-full h-auto object-cover rounded-[50px] shadow-xl">
        </div>
    </div>
</div>

<section class="">
    @include('home.partials.products')
</section>


@endsection

<style>
    .marquee-wrapper {
        display: flex;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .marquee-content {
        flex-shrink: 0;
        min-width: 100%;
        animation: marquee-scroll 60s linear infinite;
        white-space: nowrap;
    }

    @keyframes marquee-scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @media (max-width: 768px) {
        .marquee-content {
            animation-duration: 40s;
        }
    }

    @media (min-width: 1024px) {
        .marquee-content {
            animation-duration: 30s;
        }
    }
</style>
