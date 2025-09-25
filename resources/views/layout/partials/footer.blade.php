<footer class="w-full bg-gray-100 text-gray-800 relative ">
    <div class="max-width mx-auto px-4 py-8 md:py-12">
        <div
            class="flex flex-col items-center md:justify-around md:items-start text-center md:text-left space-y-8 md:space-y-0">

            <div class="flex flex-col items-center md:items-start mb-6 md:mb-0 mx-auto">
                <a href="#" class="mb-6">
                    <img src="/images/logo.svg" alt="Drogueria Jaen Logo" class=" w-full md:w-[220px]">
                </a>
            </div>

            <nav class="hidden md:block mx-auto md:mb-7">
                <ul
                    class="flex flex-wrap lg:flex-nowrap lg:gap-[30px] justify-center md:justify-start space-x-4 text-sm font-semibold">
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Inicio</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Nosotros</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Productos</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Servicios</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Cuidado En Casa</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Noticias</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition-colors">Contacto</a></li>
                </ul>
            </nav>

            <ul
                class="hidden md:flex flex-wrap lg:flex-nowrap lg:gap-[30px] justify-center space-x-4 text-sm font-semibold w-full md:justify-between">
                <div class="flex items-center md:items-center  md:flex-col md:space-x-0 md:space-y-2">
                    <div class="flex items-center space-x-2 mx-auto">
                        <img src="/icons/location.svg" alt="icono ubicación" class="w-6 h-6">
                        <span class="font-bold">Dirección</span>
                    </div>
                    <p class="text-sm text-center">Los Olivos - Lima, Perú</p>
                </div>
                <div class="flex items-center md:items-center  md:flex-col md:space-x-0 md:space-y-2">
                    <div class="flex items-center space-x-2 mx-auto">
                        <img src="/icons/email.svg" alt="icono email" class="w-6 h-6">
                        <span class="font-bold">Email</span>
                    </div>
                    <p class="text-sm text-center">drogueriajaen@gmail.com</p>
                </div>
                <div class="flex items-center md:items-center  md:flex-col md:space-x-0 md:space-y-2">
                    <div class="flex items-center space-x-2 mx-auto">
                        <img src="/icons/phone.svg" alt="icono teléfono" class="w-6 h-6">
                        <span class="font-bold">Teléfono</span>
                    </div>
                    <p class="text-sm text-center">957 390 675</p>
                </div>
        </div>
    </div>

    <div class="md:hidden w-full space-y-4 text-center ">
        <div class="border-y border-primary">
            <button data-accordion-button="inicio"
                class="w-full flex justify-between items-center py-3 font-semibold text-gray-800 px-5">
                <span>Inicio</span>
                <svg data-accordion-icon="inicio" class="w-5 h-5 transition-transform duration-300 transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div data-accordion-menu="inicio" class="hidden text-left py-2 px-5">
                <ul class="space-y-2">
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Nosotros</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Productos</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Servicios</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Cuidado En Casa</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Noticias</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Contacto</a></li>
                </ul>
            </div>
        </div>

        <div class="border-b border-primary">
            <button data-accordion-button="contacto"
                class="w-full flex justify-between items-center py-3 font-semibold text-gray-800 px-5">
                <span>Contacto</span>
                <svg data-accordion-icon="contacto" class="w-5 h-5 transition-transform duration-300 transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div data-accordion-menu="contacto" class="hidden text-left py-2 px-5">
                <ul class="space-y-2">
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Dirección</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Email</a></li>
                    <li><a href="#" class="block hover:text-cyan-600 transition-colors">Teléfono</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class=" max-width mx-auto mb-5 flex flex-col md:flex-row md:justify-between items-center space-y-4 pt-4">
        <div class="flex items-center space-x-2">
            <img src="/icons/book.svg" alt="icono libro de reclamaciones" class="w-16">
            <span class="text-sm">Libros de reclamaciones</span>
        </div>
        <div class="flex flex-col md:flex-row items-center space-y-2">
            <span class="text-sm font-semibold md:mb-0">Síguenos en:</span>
            <div class="flex space-x-4">
                <a href="#" aria-label="Facebook" class="text-gray-600 hover:text-blue-600 transition-colors">
                    <img src="/icons/fb.svg" alt="icono Facebook" class="w-5 h-5">
                </a>
                <a href="#" aria-label="TikTok" class="text-gray-600 hover:text-black transition-colors">
                    <img src="/icons/tiktok.svg" alt="icono TikTok" class="w-5 h-5">
                </a>
                <a href="#" aria-label="Instagram" class="text-gray-600 hover:text-pink-600 transition-colors">
                    <img src="/icons/instagram.svg" alt="icono Instagram" class="w-5 h-5">
                </a>
            </div>
        </div>
    </div>
    </div>

    <div class="w-full bg-blue-900 text-white text-center py-4">
        <p class="text-xs">Drogueria Jaen © 2025 - Derechos Reservados | Desarrollado por Platurno Digital</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('[data-accordion-button]');

        accordionButtons.forEach(button => {
            button.addEventListener('click', () => {
                const menuName = button.getAttribute('data-accordion-button');
                const menu = document.querySelector(`[data-accordion-menu="${menuName}"]`);
                const icon = document.querySelector(`[data-accordion-icon="${menuName}"]`);

                // Alternar la visibilidad del menú y la rotación del ícono para el botón actual
                menu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');

                // Cerrar otros menús abiertos
                accordionButtons.forEach(otherButton => {
                    const otherMenuName = otherButton.getAttribute('data-accordion-button');
                    if (otherMenuName !== menuName) {
                        const otherMenu = document.querySelector(`[data-accordion-menu="${otherMenuName}"]`);
                        const otherIcon = document.querySelector(`[data-accordion-icon="${otherMenuName}"]`);
                        otherMenu.classList.add('hidden');
                        otherIcon.classList.remove('rotate-180');
                    }
                });
            });
        });
    });
</script>
