<template>
  <div class="bg-white rounded-xl shadow-lg p-4 flex flex-col items-center justify-start text-center h-full">
    <div class="mb-4 w-full">
      <img :src="product.imageSrc" :alt="product.name" class="rounded-lg object-contain w-full h-[150px]">
    </div>
    <h3 class="font-bold text-[16px] text-gray-800 mb-1">
      {{ product.name }}
    </h3>
    <p class="text-gray-600 text-sm leading-relaxed">
      {{ product.description }}
    </p>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true,
      validator: (value) => {
        return ['imageSrc', 'name', 'description'].every(key => key in value);
      }
    }
  }
};
</script>
