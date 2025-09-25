<template>
  <section class="bg-primary py-0 md:my-[50px]">
    <div class="mx-auto px-4 max-width">
      <div class="flex flex-col lg:flex-row items-center gap-4 md:gap-12">
        <div class="w-full lg:w-1/2 order-1 flex justify-center">
          <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8 mt-8 md:mt-0 lg:translate-y-0">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center lg:text-left">
              {{ content.title }}
            </h2>
            <div class="space-y-4">
              <div v-for="item in content.features" :key="item.id" class="flex items-start gap-4">
                <img :src="item.icon" :alt="item.title + ' icon'" class="w-8 h-8 flex-shrink-0">
                <div>
                  <h3 class="font-semibold text-gray-800">{{ item.title }}</h3>
                  <p class="text-gray-600 text-sm">
                    {{ item.description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="w-full lg:w-1/2 order-2 flex justify-center lg:justify-end md:mt-[-100px]">
          <img :src="content.imageSrc" :alt="content.imageAlt"
            class="w-full max-w-lg rounded-lg object-cover ">
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      content: {
        title: '¿En qué puede ayudar Droguería Jaén?',
        imageSrc: '/images/home-help.png',
        imageAlt: 'Dos farmacéuticos revisando una tablet',
        features: [
          {
            id: 1,
            icon: '/icons/help1.svg',
            title: 'Abastecimiento y acceso confiable de productos farmacéuticos, equipamiento médico y hospitalario y dispositivos médicos con garantía y respaldo.'
          },
          {
            id: 2,
            icon: '/icons/help2.svg',
            title: 'Almacenamiento especializado que asegura la calidad e integridad de cada producto.'
          },
          {
            id: 3,
            icon: '/icons/help3.svg',
            title: 'Asesoría técnica personalizada y especializada para cada necesidad.'
          }
        ]
      }
    };
  }
};
</script>
