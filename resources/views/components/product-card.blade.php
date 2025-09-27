<div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1200"
    data-aos-easing="ease-in-out-cubic" class="cursor-pointer">
    <div
        class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center h-full min-h-[220px]
    transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] transform hover:scale-[1.03] hover:shadow-2xl hover:-translate-y-1">
        {{-- Imagen --}}
        <div class="mb-4">
            <img src="{{ $product['imageSrc'] }}" alt="{{ $product['name'] }}" class="w-full object-contain  h-[100px]">
        </div>

        {{-- Nombre --}}
        <h3 class="text-subtitle">{{ $product['name'] }}</h3>

        {{-- Descripción --}}
        <p class="text-description2">{{ $product['description'] }}</p>
    </div>

</div>
