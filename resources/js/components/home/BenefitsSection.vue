<template>
    <section class="max-width mx-auto px-4 py-12 max-width text-center">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">
                {{ content.title }}
            </h2>
            <p class="text-gray-600">
                {{ content.subtitle }}
            </p>
        </div>

        <div class="md:hidden">
            <div class="relative">
                <div class="flex overflow-hidden relative w-full h-full snap-x snap-mandatory scroll-smooth"
                    ref="carousel">
                    <div v-for="benefit in content.benefits" :key="benefit.id" class="w-full flex-shrink-0 snap-center shadow-lg">
                        <div
                            class="bg-white rounded-xl  p-6 flex flex-col items-center justify-start text-center h-full">
                            <div class="mb-4">
                                <img :src="benefit.iconSrc" :alt="benefit.title + ' icon'"
                                    class="w-14 h-14 text-primary">
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2">
                                {{ benefit.title }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                                {{ benefit.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <CarouselNavigation
                    @prev="prev"
                    @next="next" />
            </div>
        </div>

        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            <div v-for="benefit in content.benefits" :key="benefit.id"
                class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-start text-center h-full">
                <div class="mb-4">
                    <img :src="benefit.iconSrc" :alt="benefit.title + ' icon'" class="w-14 h-14 text-primary">
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">
                    {{ benefit.title }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-auto">
                    {{ benefit.description }}
                </p>
            </div>
        </div>
    </section>
</template>

<script>
import CarouselNavigation from '../shared/CarouselNavigation.vue';
export default {
    data() {
        return {
            content: {
                title: 'Beneficios de trabajar con Droguería Jaén',
                subtitle: 'Al elegirnos, nuestros clientes obtienen:',
                benefits: [
                    {
                        id: 1,
                        iconSrc: '/icons/benefits1.svg',
                        title: 'Tranquilidad y confianza',
                        description: 'Gracias a un abastecimiento oportuno y seguro.'
                    },
                    {
                        id: 2,
                        iconSrc: '/icons/benefits2.svg',
                        title: 'Atención personalizada',
                        description: 'Con soluciones adaptadas a cada empresa o institución.'
                    },
                    {
                        id: 3,
                        iconSrc: '/icons/benefits3.svg',
                        title: 'Seguridad y respaldo',
                        description: 'En cada producto y servicio.'
                    },
                    {
                        id: 4,
                        iconSrc: '/icons/benefits4.svg',
                        title: 'Soluciones integrales',
                        description: 'Convirtiéndonos en el aliado estratégico ideal para tu negocio.'
                    }
                ]
            }
        };
    },
    components: {
        CarouselNavigation
    },
    methods: {
        next() {
            const carousel = this.$refs.carousel;
            carousel.scrollBy({
                left: carousel.offsetWidth,
                behavior: 'smooth'
            });
        },
        prev() {
            const carousel = this.$refs.carousel;
            carousel.scrollBy({
                left: -carousel.offsetWidth,
                behavior: 'smooth'
            });
        }
    }
};
</script>

<style scoped>
/* Scoped styles are not strictly necessary here, but good practice. */
</style>
