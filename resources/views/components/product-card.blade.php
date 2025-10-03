<div data-aos="fade-up"
     data-aos-delay="{{ $index * 100 }}"
     data-aos-duration="1200"
     data-aos-easing="ease-in-out-cubic"
     class="cursor-pointer h-full">

  <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center
              h-full min-h-[250px] tablet:min-h-[220px] my-2 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]
              transform hover:scale-[1.03] hover:-translate-y-1">

    <div class="mb-4 flex-shrink-0">
      <img src="{{ $product['imageSrc'] }}"
           alt="{{ $product['name'] }}"
           class="w-full object-contain h-[100px]">
    </div>

    <!-- 👇 Esto hace que título + descripción empujen igual y queden centrados -->
    <div class="flex flex-col flex-1 justify-between w-full">
      <h3 class="text-subtitle mb-2">{{ $product['name'] }}</h3>
      <p class="text-description2">{{ $product['description'] }}</p>
    </div>

  </div>
</div>
