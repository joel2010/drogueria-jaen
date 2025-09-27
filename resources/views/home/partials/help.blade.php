{{-- resources/views/components/help-section.blade.php --}}
@php
    $content = [
        'title' => '¿En qué puede ayudar Droguería Jaén?',
        'imageSrc' => '/images/home-help.png',
        'imageAlt' => 'Dos farmacéuticos revisando una tablet',
        'features' => [
            [
                'id' => 1,
                'icon' => '/icons/help1.svg',
                'title' => 'Abastecimiento y acceso confiable de productos farmacéuticos, equipamiento médico y hospitalario y dispositivos médicos con garantía y respaldo.',
            ],
            [
                'id' => 2,
                'icon' => '/icons/help2.svg',
                'title' => 'Almacenamiento especializado que asegura la calidad e integridad de cada producto.',
            ],
            [
                'id' => 3,
                'icon' => '/icons/help3.svg',
                'title' => 'Asesoría técnica personalizada y especializada para cada necesidad.',
            ],
        ],
    ];
@endphp

<section class="bg-primary py-0 tablet:my-8">
    <div class="mx-auto px-4 max-width">
        <div class="flex flex-col desktop:flex-row items-center gap-4 desktop:gap-12">

            {{-- Caja de texto --}}
            <div class="w-full desktop:w-1/2 order-1 flex justify-center"
                 data-aos="fade-right"
                 data-aos-duration="1000">
                <div class="bg-white rounded-xl shadow-lg px-8 py-4 desktop:p-6 mt-6 desktop:my-10 desktop:translate-y-0">
                    <h2 class="text-title mb-2 tablet:mb-6 text-center desktop:text-left"
                        data-aos="fade-up"
                        data-aos-delay="200">
                        {{ $content['title'] }}
                    </h2>
                    <div class="space-y-4">
                        @foreach ($content['features'] as $i => $item)
                            <div class="flex items-start gap-2"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ 300 + ($i * 200) }}">
                                <img src="{{ $item['icon'] }}" alt="{{ $item['title'] }} icon" class="w-8 h-8 flex-shrink-0">
                                <div>
                                    <h3 class="text-description">{{ $item['title'] }}</h3>
                                    @if (!empty($item['description']))
                                        <p class="text-description">{{ $item['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Imagen --}}
            <div class="w-full desktop:w-1/2 order-2 flex justify-center desktop:justify-end desktop:mt-[-100px]"
                 data-aos="fade-left"
                 data-aos-duration="1000"
                 data-aos-delay="400">
                <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
                     class="w-full max-w-lg rounded-lg object-cover">
            </div>
        </div>
    </div>
</section>
