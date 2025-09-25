<template>
  <section class="bg-[#00E5A1] py-12 text-center">
    <div class="mx-auto px-4 max-width">
      <div class="mb-8">
        <h2 class="text-3xl font-bold text-primary mb-2">
          {{ content.title }}
        </h2>
        <p class="text-gray-800">
          {{ content.subtitle }}
        </p>
      </div>

      <div class="md:hidden relative">
        <div class="flex overflow-x-auto relative w-full h-full snap-x snap-mandatory scroll-smooth" ref="carousel">
          <div v-for="product in content.products" :key="product.id" class="w-1/2 flex-shrink-0 snap-center">
            <ProductCard :product="product" class="mx-2"/>
          </div>
        </div>
        <button @click="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md focus:outline-none z-10">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <button @click="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full bg-white/70 backdrop-blur-sm shadow-md focus:outline-none z-10">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-5 gap-6 justify-center">
        <ProductCard v-for="product in content.products.slice(0, 5)" :key="product.id" :product="product" />
      </div>

      <div class="mt-8">
        <button class="bg-primary text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">
          Ver más productos
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import ProductCard from '../shared/ProductCard.vue';

export default {
  components: {
    ProductCard
  },
  data() {
    return {
      content: {
        title: 'Nuestros Productos',
        subtitle: 'Descubre nuestra amplia gama de productos de alta calidad',
        products: [
          {
            id: 1,
            imageSrc: '/images/product/product1.png',
            name: 'Transpore 3M 1527-1',
            description: 'Cinta médica hipoalergénica'
          },
          {
            id: 2,
            imageSrc: '/images/product/product2.png',
            name: 'Transpore 3M 1527-1',
            description: 'Cinta médica hipoalergénica'
          },
          {
            id: 3,
            imageSrc: '/images/product/product3.png',
            name: 'Gorro de enfermera',
            description: 'Material Tela no tejida SPP'
          },
          {
            id: 4,
            imageSrc: '/images/product/product4.png',
            name: 'Transpore 3m 1527-3',
            description: 'Cinta médica hipoalergénica'
          },
          {
            id: 5,
            imageSrc: '/images/product/product5.png',
            name: 'Steri Strip 1546',
            description: 'Parche para cerrar heridas'
          }
        ]
      }
    };
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
