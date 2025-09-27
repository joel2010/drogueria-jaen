<div class="relative w-full h-[100px] tablet:h-[400px] flex items-center justify-center text-white md:mt-[-25px]"
    style="background-image: url('{{ $image }}'); background-size: cover; background-position: center;">

    <div class="absolute inset-0 bg-black opacity-40"></div>

    <div class="relative z-10 p-4 text-center max-w-[700px]">
        <h1 class="text-lg md:text-5xl font-bold leading-tight">
            {{ $title }}
        </h1>
    </div>

    {{--
        ***************************************************
        CLAVE 1: Control de Visibilidad con @if (Blade)
        Asume que $showWspButton se pasa a la vista y es FALSE por defecto
        ***************************************************
    --}}
    @if(isset($showWspButton) && $showWspButton)
        <a href="URL_DE_TU_WHATSAPP" target="_blank" rel="noopener noreferrer"
           class="items-center z-10
                  hidden tablet:inline-flex
                  bg-[#63C154] text-white font-bold rounded-full
                  shadow-lg p-1 pr-4 transition-all duration-300
                  hover:bg-[#52A847] transform hover:scale-[1.03]
                  cursor-pointer
                  absolute bottom-4 right-4
                  tablet:bottom-[-20px] tablet:right-[17%]">

            <div class="bg-white text-gray-800 rounded-full py-1 px-4 mr-3
                        leading-tight flex flex-col items-center justify-center">
                <span class="text-[10px] font-normal">Te <strong class="font-bold">ayudamos</strong> con tu</span>
                <span class="text-[10px] font-bold">Cotización</span>
            </div>

            <img src="/icons/wsp.svg" alt="WhatsApp Icon" class="w-8 h-8 tablet:w-7 tablet:h-7">
        </a>
    @endif
</div>
