<template>
    <section class="mx-auto py-12 relative max-width ">
        <div class="hidden md:flex justify-between gap-8 items-stretch mx-auto">
            <CardHome v-for="feature in features" :key="feature.id" :iconSrc="feature.iconSrc" :title="feature.title"
                :description="feature.description">
            </CardHome>
        </div>

        <div class="md:hidden flex justify-center items-stretch max-w-6xl mx-auto">
            <CarouselNavigation
                :can-go-prev="currentCardIndex > 0"
                :can-go-next="currentCardIndex < features.length - 1"
                @prev="prevCard"
                @next="nextCard" />

            <Transition name="slide-fade" mode="out-in">
                <CardHome :key="currentFeature.id" :iconSrc="currentFeature.iconSrc" :title="currentFeature.title"
                    :description="currentFeature.description">
                </CardHome>
            </Transition>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import CardHome from './CardHome.vue';
import CarouselNavigation from '../shared/CarouselNavigation.vue';
const features = ref([
  {
    id: 1,
    iconSrc: '/icons/specification.svg',
    title: 'Nos especializamos',
    description: 'Venta de productos farmacéuticos, equipamiento médico y hospitalario, dispositivos médicos'
  },
  {
    id: 2,
    iconSrc: '/icons/partner.svg',
    title: 'Aliado estratégico',
    description: 'Soluciones integrales y seguras que generan confianza y respaldo constante.'
  },
  {
    id: 3,
    iconSrc: '/icons/card_home.svg',
    title: 'Cuidado en casa',
    description: 'Atención personalizada y especializada en enfermería en el hogar.'
  },
]);
const currentCardIndex = ref(0);

const currentFeature = computed(() => {
    return features.value[currentCardIndex.value];
});

const nextCard = () => {
    if (currentCardIndex.value < features.value.length - 1) {
        currentCardIndex.value++;
    }
};

const prevCard = () => {
    if (currentCardIndex.value > 0) {
        currentCardIndex.value--;
    }
};
</script>

