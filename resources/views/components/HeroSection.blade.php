<div class="relative w-full h-[100px] tablet:h-[400px] flex items-center justify-center text-white md:mt-[-25px] {{ isset($limitHeight) && $limitHeight ? 'max-h-[100px] tablet:max-h-[200px]' : '' }}"
    style="background-image: url('{{ $image }}'); background-size: cover; background-position: center; ">
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <div class="relative z-10 p-4 text-center max-w-[700px]">
        <h1 class="text-lg md:text-5xl font-bold leading-tight">
            {{ $title }}
        </h1>
    </div>

    @if(isset($showWspButton) && $showWspButton)
        <a href="https://api.whatsapp.com/send?phone=51957390675&text=Hola%20Drogueria%20Jaen,%20quiero%20cotizar%20algunos%20productos%20que%20vi%20en%20su%20web,%20quisiera%20mas%20informacion" target="_blank" rel="noopener noreferrer"
           class="items-center z-[99]
                  grid tablet:inline-flex
                  bg-[#63C154] text-white font-bold tablet:rounded-full
                  shadow-lg tablet:p-1 transition-all duration-300
                  hover:bg-[#52A847] transform hover:scale-[1.03]
                  cursor-pointer
                  fixed bottom-5 right-5
                  tablet:bottom-8 tablet:right-8">

            <div class="bg-white text-gray-800 tablet:rounded-full py-1 px-2 tablet:px-4
                        leading-tight flex flex-col items-center justify-center">
                <span class="text-[10px] tablet:text-[14px] font-normal">Te <strong class="font-bold">ayudamos</strong> con tu</span>
                <span class="text-[10px] tablet:text-[14px] font-bold">Cotización</span>
            </div>

            <img src="/icons/wsp.svg" alt="WhatsApp Icon" class="w-10 h-10 mx-auto my-1 tablet:my-0 tablet:ml-1 tablet:w-8 tablet:h-8">
        </a>
    @endif
</div>
