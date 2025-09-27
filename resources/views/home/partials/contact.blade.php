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
'time' => 'Lunes - Viernes 8am a 5pm',
],
'formTitle' => 'Escríbenos para contactarnos',
'privacyText' => 'He leído y acepto',
'privacyLinkText' => 'Políticas de privacidad y protección de datos',
'consentText' => 'Acepto recibir contenido o propuesta comercial de Droguería Jaen',
'imageSrc' => '/images/home-contact.png',
'imageAlt' => 'Equipo de profesionales de la salud y logística de Droguería Jaén',
];
@endphp

<section class="max-width mx-auto px-4 py-12 max-width">
    {{-- Encabezado --}}
    <div class="text-center mb-5 md:mb-12" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            {{ $content['title'] }}
        </h2>
        <p class="text-gray-600">
            {{ $content['subtitle'] }}
        </p>
    </div>

    {{-- Información de contacto --}}
    <div class="flex flex-col md:flex-row justify-around items-center md:items-start gap-3 md:gap-16 mb-9">
        @foreach ($content['contactInfo'] as $index => $item)
        <div class="flex flex-col items-center text-center md:items-center gap-2 md:flex-row md:text-left"
            data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" data-aos-duration="1200"
            data-aos-easing="ease-in-out-cubic">
            <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }} icon" class="w-8 h-8 mb-2 md:mb-0">
            <div class="flex flex-col md:flex-col md:items-start">
                @foreach ($item['details'] as $detail)
                <span class="text-sm text-gray-600">{{ $detail }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    {{-- Horario --}}
    <div class="text-center bg-[#00E5A1] py-2 px-4 mx-auto mb-7 md:mb-12 w-max flex flex-col md:flex-row items-center md:gap-1 justify-center"
        data-aos="fade-up" data-aos-delay="500" data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
        <p class="font-bold text-gray-800">{{ $content['schedule']['title'] }}</p>
        <p class="text-gray-800">{{ $content['schedule']['time'] }}</p>
    </div>

    {{-- Formulario + Imagen --}}
    <div class="flex flex-col md:flex-row items-center md:items-start gap-12">
        <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-delay="600" data-aos-duration="1200"
            data-aos-easing="ease-in-out-cubic">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center md:text-left">
                {{ $content['formTitle'] }}
            </h3>
            <form class="space-y-4">
                <div>
                    <input type="text" placeholder="Nombre/Empresa"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <div class="flex flex-row gap-4">
                    <input type="text" placeholder="Teléfono"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary">
                    <input type="text" placeholder="DNI o RUC"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <div>
                    <input type="email" placeholder="Email"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <textarea placeholder="Mensaje" rows="5"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>

                <button type="submit"
                    class="w-full bg-primary text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
                    Enviar mensaje
                </button>
            </form>
            <p class="text-xs text-gray-500 mt-4 text-center md:text-left">
                {{ $content['privacyText'] }}
                <a href="#" class="text-blue-500 hover:underline">{{ $content['privacyLinkText'] }}</a>.
                {{ $content['consentText'] }}
            </p>
        </div>

        <div class="hidden md:block md:w-1/2 md:flex-shrink-0" data-aos="fade-left" data-aos-delay="700"
            data-aos-duration="1200" data-aos-easing="ease-in-out-cubic">
            <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
                class="w-full h-auto object-cover rounded-lg">
        </div>
    </div>

    {{-- Imagen móvil --}}
    <div class="block md:hidden mt-8" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1200"
        data-aos-easing="ease-in-out-cubic">
        <img src="{{ $content['imageSrc'] }}" alt="{{ $content['imageAlt'] }}"
            class="w-full h-auto object-cover rounded-lg">
    </div>
</section>
