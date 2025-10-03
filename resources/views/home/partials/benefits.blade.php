@php
$content = [
'title' => 'Beneficios de trabajar con Droguería Jaén',
'subtitle' => 'Al elegirnos, nuestros clientes obtienen:',
'benefits' => [
[
'id' => 1,
'iconSrc' => '/icons/benefits1.svg',
'title' => 'Tranquilidad y confianza',
'description' => 'Gracias a un abastecimiento oportuno y seguro.'
],
[
'id' => 2,
'iconSrc' => '/icons/benefits2.svg',
'title' => 'Atención personalizada',
'description' => 'Con soluciones adaptadas a cada empresa o institución.'
],
[
'id' => 3,
'iconSrc' => '/icons/benefits3.svg',
'title' => 'Seguridad y respaldo',
'description' => 'En cada producto y servicio.'
],
[
'id' => 4,
'iconSrc' => '/icons/benefits4.svg',
'title' => 'Soluciones integrales',
'description' => 'Convirtiéndonos en el aliado estratégico ideal para tu negocio.'
],
]
];
@endphp

@php
$content = [
'title' => 'Beneficios de trabajar con Droguería Jaén',
'subtitle' => 'Al elegirnos, nuestros clientes obtienen:',
'benefits' => [
[
'id' => 1,
'iconSrc' => '/icons/benefits1.svg',
'title' => 'Tranquilidad y confianza',
'description' => 'Gracias a un abastecimiento oportuno y seguro.'
],
[
'id' => 2,
'iconSrc' => '/icons/benefits2.svg',
'title' => 'Atención personalizada',
'description' => 'Con soluciones adaptadas a cada empresa o institución.'
],
[
'id' => 3,
'iconSrc' => '/icons/benefits3.svg',
'title' => 'Seguridad y respaldo',
'description' => 'En cada producto y servicio.'
],
[
'id' => 4,
'iconSrc' => '/icons/benefits4.svg',
'title' => 'Soluciones integrales',
'description' => 'Convirtiéndonos en el aliado estratégico ideal para tu negocio.'
],
]
];
@endphp

<section class="max-width mx-auto px-4 py-6 tablet:pt-0 tablet:pb-8 text-center relative">
    <div class="mb-8" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-title2">
            {{ $content['title'] }}
        </h2>
        <p class="text-subtitle !font-normal text-black">
            {{ $content['subtitle'] }}
        </p>
    </div>

    <div class="grid grid-cols-2 desktop:grid-cols-4 gap-7 items-stretch">
        @foreach ($content['benefits'] as $i => $benefit)
        <div data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}" data-aos-duration="900"  class="cursor-pointer">
            <div
                class="!bg-[#fafafa] rounded-xl shadow-lg p-2 tablet:p-6 flex flex-col items-center justify-start text-center h-full card-hover">
                <div class="mb-4">
                    <img src="{{ $benefit['iconSrc'] }}" alt="icono {{ strtolower($benefit['title']) }}"
                        class="w-14 h-14">
                </div>
                <h3 class="text-subtitle mb-2">
                    {{ $benefit['title'] }}
                </h3>
                <p class="text-description">
                    {{ $benefit['description'] }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>



<script>
    document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("benefitsCarouselTrack");
    const slides = document.querySelectorAll("#slide-benefit");
    const prevBtn = document.getElementById("benefitsPrevBtn");
    const nextBtn = document.getElementById("benefitsNextBtn");

    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        track.style.transform = `translateX(${offset}%)`;
    }

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateCarousel();
    });

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel();
    });
});
</script>
