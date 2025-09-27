<header class="w-full text-gray-800 z-10 relative">
    <div class="header-container">

        <div class="md:hidden flex items-center justify-between w-full mb-4">
            <div class="flex items-center space-x-4 text-xs">
                <div class="flex items-center space-x-2">
                    <img src="/icons/phone.svg" alt="icono teléfono" class="w-4 h-4">
                    <p class="text-[11px]">957 390 675</p>
                </div>
                <div class="flex items-center space-x-2 border-l border-primary pl-4">
                    <img src="/icons/location.svg" alt="icono ubicación" class="w-4 h-4">
                    <p class="max-w-[100px] leading-tight text-[11px]">Calle Vinchay MZ S LT 28...</p>
                </div>
            </div>
            <a href="#"
                class="bg-green-600 text-white font-semibold py-2 px-4 flex items-center space-x-1 shadow-lg hover:bg-green-700 transition-colors">
                <img src="/icons/wsp.svg" alt="icono whatsapp" class="w-4 h-4">
                <span class="text-[11px]">COTIZA AQUÍ</span>
            </a>
        </div>

        <div class="md:hidden flex justify-between items-center w-full mb-4 pr-4">
            <button id="mobile-menu-button" class="text-primary focus:outline-none">
                <img src="/icons/menu.svg" alt="Menú móvil" class="w-6 h-6">
            </button>
            <a href="#" class="flex items-center">
                <img src="/images/logo_mobile.png" alt="Drogueria Jaen Logo" class="w-[170px]">
            </a>
            <div class="w-8"></div>
        </div>

        <div class="hidden md:flex flex-col md:flex-row md:items-center justify-between w-full mb-4 md:mb-0">
            <a href="#" class="mb-4 md:mb-0 flex items-center">
                <img src="/images/logo.svg" alt="Drogueria Jaen Logo" class="w-[302px]">
            </a>
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-8 text-sm">
                <div class="flex items-center space-x-2">
                    <img src="/icons/phone.svg" alt="icono teléfono" class="w-6 h-6">
                    <div>
                        <span class="font-bold">Contáctanos</span>
                        <p class="text-sm">957 390 675</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 border-l border-primary pl-4">
                    <img src="/icons/location.svg" alt="icono ubicación" class="w-6 h-6">
                    <div>
                        <span class="font-bold">Nuestra oficina</span>
                        <p class="text-sm text-gray-600 max-w-[200px]">Calle Vinchay MZ S LT 28 URB, Los Olivos
                            - Lima, Perú</p>
                    </div>
                </div>
            </div>
            <a href="#"
                class="bg-green-600 text-white font-semibold py-2 px-6 rounded-full flex items-center space-x-2 shadow-lg hover:bg-green-700 transition-colors mt-4 md:mt-0 md:ml-8">
                <img src="/icons/wsp.svg" alt="icono whatsapp" class="w-5 h-5">
                <span>COTIZA AQUÍ</span>
            </a>
        </div>

        <nav class="hidden md:block w-full bg-primary text-white mt-4 md:mt-0">
            <ul class="flex flex-wrap justify-between items-center py-3 px-4">
                <li><a href="#" class="px-4 py-2 font-semibold text-cyan-300">Inicio</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Nosotros</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Productos</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Servicios</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Cuidado en Casa</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Noticias</a></li>
                <li><a href="#" class="px-4 py-2 hover:text-cyan-300 transition-colors">Contacto</a></li>
            </ul>
        </nav>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-primary text-white py-4">
        <ul class="flex flex-col space-y-4 px-4">
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Inicio</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Nosotros</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Productos</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Servicios</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Cuidado En Casa</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Noticias</a></li>
            <li><a href="#" class="block py-2 hover:text-cyan-300 transition-colors">Contacto</a></li>
        </ul>
    </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  });
</script>
