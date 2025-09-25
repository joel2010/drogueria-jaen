<template>
    <section class="mx-auto px-4 xl:px-0 max-width text-justify pb-10">
        <div class="flex flex-col lg:flex-row items-start lg:items-stretch gap-12">
            <div class="w-full flex-1 order-1 lg:order-2">
                <h2 class="text-3xl font-bold text-primary mb-1">
                    {{ content.title }}
                </h2>
                <p v-for="(paragraph, index) in content.paragraphs" :key="index" class="text-gray-600 mb-2">
                    {{ paragraph }}
                </p>

                <div class="w-full order-2 lg:hidden my-4">
                    <img :src="content.imageSrc" :alt="content.imageAlt"
                        class="rounded-lg object-cover w-full h-[300px]">
                </div>

                <div class="md:hidden flex justify-center items-stretch max-w-6xl mx-auto relative">
                    <CarouselNavigation :can-go-prev="currentCardIndex > 0"
                        :can-go-next="currentCardIndex < content.features.length - 1" @prev="prevCard"
                        @next="nextCard" />

                    <Transition name="slide-fade" mode="out-in">
                        <div :key="currentFeature.title" class="flex flex-col items-center">
                            <div class="flex items-center mb-4">
                                <img :src="currentFeature.iconSrc" :alt="'icono ' + currentFeature.title.toLowerCase()"
                                    class="min-w-[50px] h-[50px] mr-2">
                                <h3 class="font-semibold text-xl text-gray-800">{{ currentFeature.title }}</h3>
                            </div>
                            <p class="text-gray-600 text-sm text-center px-4">
                                {{ currentFeature.description }}
                            </p>
                        </div>
                    </Transition>
                </div>

                <div class="hidden md:block space-y-6 order-3 lg:order-4 mt-8">
                    <div v-for="item in content.features" :key="item.title" class="flex items-start">
                        <div class="flex items-center mb-2">
                            <img :src="item.iconSrc" :alt="'icono ' + item.title.toLowerCase()"
                                class="min-w-[50px] h-[50px] mr-2">
                        </div>
                        <div>
                            <h3 class="font-semibold text-xl text-gray-800">{{ item.title }}</h3>
                            <p class="text-gray-600 text-sm">
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 order-3 lg:order-4 flex justify-center lg:justify-start">
                    <button type="submit"
                        class="w-full bg-primary mx-auto md:mx-0 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max md:ml-15 mt-8">
                        Conócenos
                    </button>
                </div>
            </div>

            <div class="hidden lg:block order-2 lg:order-1">
                <img :src="content.imageSrc" :alt="content.imageAlt" class="rounded-lg shadow-lg" width="300">
            </div>
        </div>
    </section>
</template>

<script>
import { ref, computed } from 'vue';
import CarouselNavigation from '../shared/CarouselNavigation.vue';

export default {
    components: {
        CarouselNavigation
    },
    setup() {
        const content = ref({
            title: 'Nosotros',
            paragraphs: [
                'En Droguería Jaén somos una empresa del rubro salud dedicada a ofrecer soluciones confiables e integrales para el bienestar de las personas y el fortalecimiento del sector sanitario.',
                'Nos especializamos en la venta de productos farmacéuticos, equipamiento médico y hospitalario, dispositivos médicos y contamos con un servicio seguro de almacenamiento que garantiza la conservación de los productos e insumos bajo los más altos estándares de calidad.'
            ],
            imageSrc: '/images/home-about.png',
            imageAlt: 'Persona con tablet en droguería',
            features: [
                {
                    iconSrc: '/icons/mission.svg',
                    title: 'Misión',
                    description: 'Brindar soluciones integrales en salud mediante medicamentos, dispositivos, equipamiento médico, almacenamiento especializado y cuidados de enfermería en casa, garantizando calidad, continuidad y confianza para instituciones y familias.'
                },
                {
                    iconSrc: '/icons/vision.svg',
                    title: 'Visión',
                    description: 'Ser reconocidos como la empresa líder e integral en salud, destacando por nuestra confiabilidad, innovación y compromiso humano, y consolidándonos como el aliado primordial de instituciones y hogares.'
                },
                {
                    iconSrc: '/icons/philosophy.svg',
                    title: 'Filosofía',
                    description: 'Creemos que la salud es el bien más valioso. Nuestra filosofía se basa en la integralidad, confianza y compromiso humano, ofreciendo un servicio completo que asegura bienestar y tranquilidad a cada cliente.'
                }
            ]
        });

        const currentCardIndex = ref(0);

        const currentFeature = computed(() => {
            return content.value.features[currentCardIndex.value];
        });

        const nextCard = () => {
            if (currentCardIndex.value < content.value.features.length - 1) {
                currentCardIndex.value++;
            }
        };

        const prevCard = () => {
            if (currentCardIndex.value > 0) {
                currentCardIndex.value--;
            }
        };

        return {
            content,
            currentCardIndex,
            currentFeature,
            nextCard,
            prevCard
        };
    }
};
</script>

<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    opacity: 0;
    transform: translateX(20px);
}
</style>
