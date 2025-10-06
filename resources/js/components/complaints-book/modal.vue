<template>
  <div v-if="isOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/80 bg-opacity-75 transition-opacity" @click="closeModal"></div>

    <div class="relative bg-primary rounded-[45px] shadow-xl max-w-lg w-full mx-auto my-auto p-0 z-50 transform transition-all scale-100 opacity-100">
      <button
        type="button"
        class="absolute top-3 right-4 z-50 bg-white text-primary rounded-full p-1 shadow-lg  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
        @click="closeModal"
        aria-label="Cerrar"
      >
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <div class="bg-blue-800 p-0 rounded-[45px] relative overflow-hidden">
        <img :src="imageUrl" alt="Nuestro equipo de asesores de Droguería Jaen" class="w-full h-auto object-cover max-h-56 sm:max-h-64 object-top">
      </div>

      <div class="bg-white p-6 sm:p-8  text-center -mt-8 relative z-10 rounded-[45px]">
        <div class="bg-white rounded-lg">
          <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">¡Gracias por confiar en nosotros!</h3>
          <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
            En breve, uno de nuestros asesores se comunicará contigo para brindarte la información que necesitas
            de manera personalizada.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  show: {
    type: Boolean,
    default: false
  },
  imageUrl: {
    type: String,
    required: true,
    default: '/images/home-contact.png'
  }
});

const emit = defineEmits(['close']);

const isOpen = ref(props.show);

watch(() => props.show, (newVal) => {
  isOpen.value = newVal;
});

const closeModal = () => {
  isOpen.value = false;
  emit('close');
};

// Escuchar la tecla 'Escape' para cerrar el modal
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && isOpen.value) {
    closeModal();
  }
});
</script>

<style scoped>
/* No se necesitan estilos scoped adicionales si Tailwind está configurado correctamente */
</style>
