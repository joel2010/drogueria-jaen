@php
// --- Datos de Ejemplo ---
$categories = ['Dispositivos médicos', 'Ofertas'];
$filters = [
'Categoría' => ['Dispositivos médicos', 'Ofertas'],
'Marca' => ['3M', 'B. Braun', 'Johnson & Johnson'],
'Tipo' => ['Cintas', 'Gasa', 'Suturas'],
'Especialidad' => [
'Cirugía', 'Desinfección', 'Drenaje', 'Emergencia', 'Esterilización',
'Ginecología', 'Laboratorio', 'Medición', 'Oxígeno Terapia', 'Protección', 'Rehabilitación'
],
];

// Array de productos de ejemplo (asume que se recibe desde el controlador)
$products = [
// Usaremos 12 productos de ejemplo para simular la rejilla
['name' => 'Transpore 3M 1527-3', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product1.png'],
['name' => 'Transpore 3M 1527-1', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product2.png'],
['name' => 'Transpore 3M 1527-1', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product3.png'],
['name' => 'Gasa Estéril 7.5 x 7.5 cm', 'description' => 'Cubre y protege heridas', 'imageSrc' =>
'/images/product/product4.png'],
['name' => 'Transpore 3M 1527-1', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product5.png'],
['name' => 'Steri Strip 1546', 'description' => 'Parche para cerrar heridas', 'imageSrc' =>
'/images/product/product1.png'],
['name' => 'Transpore 3M 1527-1', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product2.png'],
['name' => 'Steri Strip 1541', 'description' => 'Cinta médica hipoalergénica', 'imageSrc' =>
'/images/product/product3.png'],
['name' => 'Sutura Ethicon', 'description' => 'Sutura de nylon monofilamento', 'imageSrc' =>
'/images/product/product4.png'],
['name' => 'Trocar Geyi', 'description' => 'Estéril, hipoalergénico, atóxico', 'imageSrc' =>
'/images/product/product5.png'],
['name' => 'Gorro de enfermería', 'description' => 'Material Tela no tejido SPP', 'imageSrc' =>
'/images/product/product1.png'],
['name' => 'Línea opaca para bomba de infusión', 'description' => 'Equipo para administración de soluciones', 'imageSrc'
=> '/images/product/product2.png'],
];

$activeFilter = 'Categoría';
$activeSubFilter = 'Laboratorio';

@endphp

<div class="max-w-desktop mx-auto py-8">

    <div
        class="mx-4 flex flex-col tablet:flex-row justify-between items-start sm:items-center mb-6 border-b border-gray-400 pb-4 desktop:hidden">

        <h1 class="text-3xl font-bold text-gray-800 mb-4 tablet:mb-0">Productos</h1>
        <div class="flex space-x-4 w-full tablet:w-auto justify-between">
            <button id="openFilterMenu"
                class="flex items-center max-w-max justify-center px-4 py-1 text-sm border border-primary rounded-md bg-white text-primary flex-grow tablet:flex-grow-0 shadow-sm transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0011 15.414V21a1 1 0 01-1 1H7a1 1 0 01-1-1v-5.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
                <span class="text-primary">Filtrar</span>
            </button>

            <button
                class="flex items-center w-full bg-white text-primary border border-primary text-sm py-1 px-5 tablet:py-2 tablet:px-8 rounded-md transition-colors duration-300 max-w-max">
                <span>Orden predeterminado</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="desktop:grid desktop:grid-cols-[280px_1fr] desktop:gap-10 max-width mx-auto">
        <aside
            class="hidden desktop:block space-y-0 bg-[#F3F3F3] border p-4 border-gray-200 rounded-xl shadow-lg overflow-hidden sticky top-8 h-full">
            @foreach ($filters as $filterName => $filterOptions)
            <div class="border-t border-gray-200 mb-2">
                <button data-filter-name="{{ str_replace(' ', '-', $filterName) }}" class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary
                        {{ $filterName === $activeFilter ? 'bg-primary text-[#00FFC3]' : 'hover:bg-gray-100 ' }}">
                    {{ $filterName }}
                    <svg class="w-4 h-4 transition-transform duration-300
                        {{ $filterName === $activeFilter ? 'text-[#00FFC3] rotate-90' : 'text-gray-500' }}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div id="content-{{ str_replace(' ', '-', $filterName) }}"
                    class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out {{ $filterName === $activeFilter ? 'block' : 'hidden' }}">
                    <div class="space-y-0 py-1">
                        @foreach ($filterOptions as $option)
                        <a href="#"
                            class="text-gray-800 p-2 py-1  text-[12px] flex gap-2 items-center transition-colors
                            {{ $filterName === $activeFilter && $option === $activeSubFilter ? 'bg-gray-200 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            {{ $option }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </aside>

        <div>
            <div class="hidden desktop:flex justify-between items-center mb-6 border-b border-gray-400 pb-1">
                <h2 class="text-3xl font-bold text-gray-800">Productos</h2>
                <div class="relative">
                    <button
                        class="flex items-center w-full bg-primary text-white font-semibold py-1 px-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max">
                        <span>Orden predeterminado</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 desktop:grid-cols-4 gap-4">
                @foreach ($products as $index => $product)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1200"
                    data-aos-easing="ease-in-out-cubic" class="cursor-pointer">
                    <a href="/producto/1">
                        <div
                            class="bg-white rounded-xl border border-gray-200 p-4 flex flex-col items-center text-center h-full min-h-[220px]
                                transition-all duration-300 transform hover:scale-[1.03] hover:shadow-xl relative overflow-hidden shadow-xl">

                            <div class="mb-4 flex-shrink-0 flex items-center justify-center w-full h-[100px] mt-2">
                                <img src="{{ $product['imageSrc'] }}" alt="{{ $product['name'] }}"
                                    class="max-w-full max-h-full object-contain">
                            </div>

                            <h3 class="text-base font-bold text-gray-800 leading-tight mt-auto">{{ $product['name'] }}</h3>

                            <p class="text-sm text-gray-500 mt-1 mb-2">{{ $product['description'] }}</p>

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="flex justify-center items-center mt-12 space-x-1 sm:space-x-2 mx-auto">
        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 hover:text-blue-700 hover:border-blue-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </a>

        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-primary text-white font-bold text-sm sm:text-base shadow-lg">1</a>
        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-primary rounded-full text-gray-700 hover:bg-gray-100 text-sm sm:text-base transition-colors">2</a>
        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-primary rounded-full text-gray-700 hover:bg-gray-100 text-sm sm:text-base transition-colors">3</a>
        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-primary rounded-full text-gray-700 hover:bg-gray-100 text-sm sm:text-base transition-colors">4</a>

        <span class="text-gray-500 hidden sm:block">...</span>

        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-primary rounded-full text-gray-700 hover:bg-gray-100 text-sm sm:text-base transition-colors hidden sm:flex">9</a>

        <a href="#"
            class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 hover:text-blue-700 hover:border-blue-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
<div class="hidden !tablet:hidden" id="filterBackdrop" aria-modal="true" role="dialog"></div>
<div id="filterMenu"
    class="fixed inset-0 z-50 max-w-[300px] ml-auto bg-white transform translate-x-full transition-transform duration-300 desktop:hidden"
    aria-modal="true" role="dialog">

    <div class="flex justify-between items-center p-4 border-b shadow-sm">
        <h3 class="text-xl font-bold flex items-center text-gray-800">
            <svg class="w-5 h-5 mr-2 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0011 15.414V21a1 1 0 01-1 1H7a1 1 0 01-1-1v-5.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                </path>
            </svg>
            Filtrar Productos
        </h3>
        <button id="closeFilterMenu" class="text-gray-500 hover:text-gray-900 focus:outline-none p-1">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="p-4 overflow-y-auto h-full pb-32 ">

        @foreach ($filters as $filterName => $filterOptions)
        <div class="border-t pt-4">
            <button class="w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group">
                {{ $filterName }}
                <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-300 group-focus:rotate-90"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <div
                class="mt-2 space-y-1 text-sm overflow-hidden transition-all duration-500 ease-in-out {{ $filterName === $activeFilter ? 'block' : 'hidden' }}">
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 space-y-1">
                    @foreach ($filterOptions as $option)
                    <a href="#"
                        class="flex items-center justify-between text-gray-800 hover:text-blue-700 transition-colors p-2 rounded-md hover:bg-white">
                        <span>{{ $option }}</span>
                        <input type="checkbox" class="rounded text-blue-700 focus:ring-blue-500 w-4 h-4">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t flex justify-between space-x-4 shadow-2xl">
        <button
            class="w-1/2 py-3 text-lg font-semibold text-primary bg-[#00FFC3] rounded-md transition-colors">
            Limpiar
        </button>
        <button
            class="w-1/2 py-3 text-lg font-semibold text-white bg-primary rounded-md hover:bg-blue-800 transition-colors">
            Aplicar
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('openFilterMenu');
        const closeBtn = document.getElementById('closeFilterMenu');
        const menu = document.getElementById('filterMenu');

        if (openBtn && menu) {
            openBtn.addEventListener('click', () => {
                menu.classList.remove('translate-x-full');
                document.body.style.overflow = 'hidden';
                document.getElementById('filterBackdrop').classList.remove('hidden');
                document.getElementById('filterBackdrop').classList.add('fixed', 'inset-0', 'bg-black/30', 'bg-opacity-50', 'z-40');
            });
        }

        if (closeBtn && menu) {
            closeBtn.addEventListener('click', () => {
                menu.classList.add('translate-x-full');
                document.body.style.overflow = '';
                document.getElementById('filterBackdrop').classList.add('hidden');
                document.getElementById('filterBackdrop').classList.remove('fixed', 'inset-0', 'bg-black/30', 'bg-opacity-50', 'z-40');
            });
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menu && !menu.classList.contains('translate-x-full')) {
                closeBtn.click();
            }
        });

        document.querySelectorAll('.filter-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const filterName = this.getAttribute('data-filter-name');
                const content = document.getElementById(`content-${filterName}`);
                const arrow = this.querySelector('svg');

                // 1. Alternar visibilidad del contenido (Acordeón)
                content.classList.toggle('hidden');

                // 2. Alternar estilo de botón activo/inactivo (Fondo azul/gris)
                this.classList.toggle('bg-primary');
                this.classList.toggle('text-[#00FFC3]');
                this.classList.toggle('hover:bg-gray-100');

                // 3. Alternar estilo de flecha (Rotación)
                arrow.classList.toggle('rotate-90');
                arrow.classList.toggle('text-[#00FFC3]');
                arrow.classList.toggle('text-gray-500');


            });
        });
    });
</script>
