<div class="bg-[#fafafa] p-6 rounded-[20px] shadow-lg">

    <div class="flex items-center mb-3 tablet:grid gap-1 justify-center">
        <div class="flex-shrink-0 mr-3 tablet:mr-0">
            <img src="{{ $data['icon'] }}"
                 alt="Ícono de {{ $data['title'] }}"
                 class="w-9 h-9 tablet:w-12 tablet:h-12 mx-auto">
        </div>

        <h3 class="text-title">
            {{ $data['title'] }}
        </h3>
    </div>

    <p class="text-description text-center leading-relaxed">
        {{ $data['text'] }}
    </p>

</div>
