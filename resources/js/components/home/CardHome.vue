<template>
  <div class="bg-white rounded-lg shadow-md p-4 md:p-6 flex flex-col items-center text-center h-auto md:max-w-xs w-full">
    <div class="mb-4">
      <img :src="iconSrc" :alt="title + ' icon'" class="w-14 h-14 text-primary">
    </div>

    <h3 class="text-xl font-semibold text-gray-800 mb-2">
      {{ title }}
    </h3>

    <p class="text-gray-600 text-sm leading-relaxed mb-auto">
      {{ description }}
    </p>
  </div>
</template>

<script>
export default {
  props: {
    iconSrc: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>
/* No changes needed */
</style>
