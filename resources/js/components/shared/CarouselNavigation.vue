<template>
  <div>
    <button @click="$emit('prev')"
            :class="['absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300', {'opacity-0': !canGoPrev}]"
            :aria-label="'Anterior'">
      <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
      </svg>
    </button>

    <button @click="$emit('next')"
            :class="['absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md transition-all duration-300', {'opacity-0': !canGoNext}]"
            :aria-label="'Siguiente'">
      <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    canGoPrev: {
      type: Boolean,
      default: true
    },
    canGoNext: {
      type: Boolean,
      default: true
    }
  },
  emits: ['prev', 'next']
};
</script>
