@php
$content = [
    'title' => 'Contáctanos',
    'subtitle' => 'Para consultas y compras, contáctanos a través de los siguientes medios:',
    'contactInfo' => [
        [
            'id' => 1,
            'name' => 'Email',
            'icon' => '/icons/email.svg',
            'details' => ['comercial@drogueriajaen.com.pe', 'ventas@drogueriajaen.com.pe'],
        ],
        [
            'id' => 2,
            'name' => 'Teléfono',
            'icon' => '/icons/phone.svg',
            'details' => ['957 390 675'],
        ],
        [
            'id' => 3,
            'name' => 'Ubicación',
            'icon' => '/icons/location.svg',
            'details' => ['Los Olivos - Lima, Perú.'],
        ],
    ],
    'schedule' => [
        'title' => 'Horario de atención:',
        'time' => 'Lunes - Viernes 8:00 Am a 5:00 Pm',
    ],
    'formTitle' => 'Escríbenos para contactarnos',
    'privacyText' => 'He leído y acepto',
    'privacyLinkText' => 'Políticas de privacidad y protección de datos',
    'consentText' => 'Acepto recibir contenido o propuesta comercial de Droguería Jaen',
    'imageSrc' => '/images/home-contact.png',
    'imageAlt' => 'Equipo de profesionales de la salud y logística de Droguería Jaén',
];
@endphp

<section class="max-width mx-auto px-4 py-8 max-width">
    {{-- Encabezado --}}
    <div class="text-center mb-5 tablet:mb-8" data-aos="fade-up" data-aos-duration="1200"
        data-aos-easing="ease-in-out-cubic">
        <h2 class="text-title2">
            {{ $content['title'] }}
        </h2>
        <p class="text-description !text-black">
            {{ $content['subtitle'] }}
        </p>
    </div>

    <div class="flex flex-col justify-around items-start tablet:flex-row tablet:items-center gap-3 tablet:gap-16 mb-7">
        @foreach ($content['contactInfo'] as $index => $item)
            <div class="flex items-center text-left gap-4 tablet:gap-2 mx-auto tablet:mx-0" data-aos="fade-up"
                data-aos-delay="{{ $index * 150 }}" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">

                <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }} icon" class="w-8 h-8 flex-shrink-0">

                <div class="flex flex-col items-start w-[170px] tablet:w-auto text-center">
                    @foreach ($item['details'] as $detail)
                        @if (Str::contains(Str::lower($detail), ['@']))
                            <a href="mailto:{{ $detail }}"
                                class="text-description !text-black hover:underline text-center">{{ $detail }}</a>
                        @elseif (Str::contains(Str::lower($item['name']), ['teléfono', 'whatsapp', 'wsp']))
                            <a href="https://api.whatsapp.com/send?phone=51957390675&text=Hola%20Drogueria%20Jaen,%20quiero%20cotizar%20algunos%20productos%20que%20vi%20en%20su%20web,%20quisiera%20mas%20informacion"
                                target="_blank" class="text-description !text-black hover:underline text-center">{{ $detail }}</a>
                        @else
                            <span class="text-description !text-black">{{ $detail }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center bg-[#00E5A1] py-2 px-9 md:px-4 mx-auto mb-7 w-max flex flex-col tablet:flex-row items-center tablet:gap-1 justify-center"
        data-aos="fade-up" data-aos-delay="500" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
        <p class="text-subtitle">{{ $content['schedule']['title'] }}</p>
        <p class="text-subtitle !font-normal mt-[-7px] tablet:mt-0">{{ $content['schedule']['time'] }}</p>
    </div>

    <div class="flex flex-col tablet:flex-row items-center tablet:items-start gap-12">
        <div class="w-full tablet:w-1/2" data-aos="fade-right" data-aos-delay="600" data-aos-duration="1200"
            data-aos-easing="ease-in-out-cubic">
            <h3 class="text-title mb-2 tabletmb-6 text-center tablet:text-left">
                {{ $content['formTitle'] }}
            </h3>
            <form class="space-y-4" method="POST" action="/contacto">
                @csrf
                <div>
                    <input type="text" placeholder="Nombre/Empresa"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary"
                        name="name" value="{{ old('name') }}" required maxlength="200">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-row gap-4">
                    <div>
                        <input type="tel" placeholder="Teléfono"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary"
                            name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" placeholder="DNI o RUC"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary"
                            name="document" value="{{ old('document') }}" required maxlength="11">
                        @error('document')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="email" placeholder="Email"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary"
                        name="email" value="{{ old('email') }}" required maxlength="200">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <textarea placeholder="Mensaje" rows="5"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary mb-1"
                    name="message" required maxlength="500">{{ old('message') }}</textarea>
                @error('message')
                    <span class="error">{{ $message }}</span>
                @enderror

                <button type="submit"
                    class="w-full bg-primary text-white font-semibold py-2 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
                    Enviar mensaje
                </button>
            </form>
            <p class="text-description !text-black mt-4 text-center tablet:text-left">
                {{ $content['privacyText'] }}
                <a href="#" class="text-blue-500 hover:underline">{{ $content['privacyLinkText'] }}</a>.
                {{ $content['consentText'] }}
            </p>
        </div>

        <div class="hidden tablet:block tablet:w-1/2 tablet:flex-shrink-0" data-aos="fade-left" data-aos-delay="700"
            data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
            <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
                class="w-full h-auto object-cover rounded-lg">
        </div>
    </div>

    <div class="block tablet:hidden mt-8" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1200"
        data-aos-easing="ease-in-out-cubic">
        <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
            class="w-full h-auto object-cover rounded-lg">
    </div>

    @if (session()->has('ok'))
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" id="divModalContact">
            <div class="fixed inset-0 bg-black/80 bg-opacity-75 transition-opacity"></div>
            <div
                class="relative bg-primary rounded-[45px] shadow-xl max-w-lg w-full mx-auto my-auto p-0 z-50 transform transition-all scale-100 opacity-100">
                <button type="button"
                    class="absolute top-3 right-4 z-50 bg-white text-primary rounded-full p-1 shadow-lg  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" aria-label="Cerrar" id="btnCloseModalContact">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="bg-blue-800 p-0 rounded-[45px] relative overflow-hidden">
                    <img src="{{ asset('images/home-contact.png') }}" alt="Nuestro equipo de asesores de Droguería Jaen"
                        class="w-full h-auto object-cover max-h-56 sm:max-h-64 object-top">
                </div>

                <div class="bg-white p-6 sm:p-8  text-center -mt-8 relative z-10 rounded-[45px]">
                    <div class="bg-white rounded-lg">
                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">¡Gracias por confiar en nosotros!</h3>
                        <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
                            En breve, uno de nuestros asesores se comunicará contigo para brindarte la información que necesitas
                            de manera personalizada.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>