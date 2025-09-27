<header class="w-full text-gray-800 z-10 relative">
    <div class="header-container">

        <div class="tablet:hidden flex items-center justify-between w-full mb-4">
            <div class="flex items-center space-x-4 text-xs pl-4">
                <div class="flex items-center space-x-2 mr-2">
                    <img src="/icons/phone.svg" alt="icono teléfono" class="w-4 h-4">
                    <p class="text-[11px]">957 390 675</p>
                </div>
                <div class="flex items-center space-x-2 border-l border-primary pl-2">
                    <img src="/icons/location.svg" alt="icono ubicación" class="w-4 h-4 mr-1">
                    <p class="max-w-[100px] leading-tight text-[11px]">Los Olivos - Lima, Perú</p>
                </div>
            </div>
            <a href="#"
                class="bg-green-600 text-white font-semibold py-2 px-4 flex items-center space-x-1 shadow-lg hover:bg-green-700 transition-colors">
                <img src="/icons/wsp.svg" alt="icono whatsapp" class="w-4 h-4">
                <span class="text-[11px]">COTIZA AQUÍ</span>
            </a>
        </div>

        <div class="tablet:hidden flex justify-between items-center w-full mb-0 tablet:mb-4 pr-4">
            <button id="mobile-menu-button" class="text-primary focus:outline-none">
                <img src="/icons/menu.svg" alt="Menú móvil" class="w-8 h-8">
            </button>
            <a href="#" class="flex items-center">
                <img src="/images/logo_mobile.png" alt="Drogueria Jaen Logo" class="w-[170px]">
            </a>
            <div class="w-8"></div>
        </div>

        <div class="hidden tablet:flex flex-col tablet:flex-row tablet:items-center justify-between w-full mb-4 tablet:mb-3">
            <a href="#" class="mb-4 tablet:mb-0 flex items-center">
                <img src="/images/logo.svg" alt="Drogueria Jaen Logo" class="w-[302px]">
            </a>
            <div class="grid tablet:grid-cols-[2fr_1fr] gap-4 items-center">
                <div class="flex flex-col tablet:flex-row items-center space-y-2 tablet:space-y-0 tablet:space-x-8 text-sm">
                    <div class="flex items-center space-x-2 ">
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
                            <p class="text-sm text-gray-600 max-w-[200px]">Los Olivos
                                - Lima, Perú</p>
                        </div>
                    </div>
                </div>
                <a href="#"
                    class="bg-green-600 text-white font-semibold py-1 px-5 rounded-full flex items-center space-x-2 shadow-lg hover:bg-green-700 transition-colors mt-4 tablet:mt-0 tablet:ml-2">
                    <img src="/icons/wsp.svg" alt="icono whatsapp" class="w-5 h-5">
                    <span>COTIZA AQUÍ</span>
                </a>
            </div>
        </div>

        <nav class="hidden tablet:block w-full bg-primary text-white mt-4 tablet:mt-0">
            <nav class="hidden tablet:block w-full bg-primary text-white mt-4 tablet:mt-0">
                <ul class="flex justify-between items-center py-2 px-4">
                    <li class="w-full text-center">
                        <a href="#" class="w-full inline-block font-semibold text-[#00E5A1]">Inicio</a>
                    </li>

                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Nosotros</a>
                    </li>
                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Productos</a>
                    </li>
                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Servicios</a>
                    </li>
                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Cuidado en
                            Casa</a>
                    </li>
                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Noticias</a>
                    </li>
                    <li class="border-l border-white w-full text-center">
                        <a href="#" class="w-full inline-block hover:text-[#00E5A1] transition-colors">Contacto</a>
                    </li>
                </ul>
            </nav>
        </nav>
    </div>

    <div id="mobile-menu" class="hidden tablet:hidden bg-primary text-white py-4">
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
