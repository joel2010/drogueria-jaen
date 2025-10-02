<template>
  <div class="max-w-desktop mx-auto py-8">
    <!-- Header móvil -->
    <div
      class="mx-4 flex flex-col md:flex-row justify-between items-start sm:items-center mb-6 border-b border-gray-400 pb-4 md:hidden"
    >
      <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Productos</h1>
      <div class="flex space-x-4 w-full md:w-auto justify-between">
        <button
          @click="toggleMobileFilter"
          class="flex items-center max-w-max justify-center px-4 py-1 text-sm border border-primary rounded-md bg-white text-primary flex-grow md:flex-grow-0 shadow-sm transition-colors"
        >
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18v3L12 14v8H8v-8L3 7V4z" />
          </svg>
          <span class="text-primary">Filtrar</span>
        </button>

 <div class="relative">
          <button
            @click="toggleSortMenu"
            class="flex items-center w-full bg-white text-primary border border-primary text-sm py-1 px-5 md:py-2 md:px-8 rounded-md transition-colors duration-300 max-w-max"
          >
            <span>{{ sortLabel }}</span>
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Popover -->
          <div
            v-show="openSortMenu"
            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border z-50"
          >
            <button
              class="w-full text-left px-4 py-2 hover:bg-gray-100"
              @click="setSort('asc')"
            >
             Orden ascendente
            </button>
            <button
              class="w-full text-left px-4 py-2 hover:bg-gray-100"
              @click="setSort('desc')"
            >
              Orden descendente
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenedor principal -->
    <div class="md:grid md:grid-cols-[280px_1fr] md:gap-10 max-width mx-auto">
      <!-- Sidebar desktop -->
      <aside
        class="hidden md:block space-y-0 bg-[#F3F3F3] border p-4 border-gray-200 rounded-xl shadow-lg overflow-hidden sticky top-8 h-full"
      >
        <div v-for="(options, filterName) in filters" :key="filterName" class="border-t border-gray-200 mb-2">
          <button
            @click="toggleFilter(filterName)"
            class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary"
            :class="{
              'bg-primary text-[#00FFC3]': openFilters.includes(filterName),
              'hover:bg-gray-100': !openFilters.includes(filterName)
            }"
          >
            {{ filterName }}
            <svg
              class="w-4 h-4 transition-transform duration-300"
              :class="{
                'text-[#00FFC3] rotate-90': openFilters.includes(filterName),
                'text-gray-500': !openFilters.includes(filterName)
              }"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <div
            v-show="openFilters.includes(filterName)"
            class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out"
          >
            <div class="space-y-0 py-1">
              <a
                v-for="option in options"
                :key="option"
                href="#"
                class="text-gray-800 p-2 py-1 text-[12px] flex gap-2 items-center transition-colors"
                :class="{
                  'bg-gray-200 text-primary font-semibold': selectedFilters[filterName]?.includes(option),
                  'hover:bg-gray-100': !(selectedFilters[filterName]?.includes(option))
                }"
                @click.prevent="toggleSubFilter(filterName, option)"
              >
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ option }}
              </a>
            </div>
          </div>
        </div>
      </aside>

      <!-- Productos -->
      <div>
        <div class="hidden md:flex justify-between items-center mb-6 border-b border-gray-400 pb-1">
          <h2 class="text-3xl font-bold text-gray-800">Productos</h2>
          <div class="relative">
            <button
              @click="toggleSortMenu"
              class="flex items-center w-full bg-primary text-white font-semibold py-1 px-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max"
            >
              <span>{{ sortLabel }}</span>
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Popover -->
            <div
              v-show="openSortMenu"
              class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border z-50"
            >
              <button
                class="w-full text-left px-4 py-2 hover:bg-gray-100"
                @click="setSort('asc')"
              >
                Orden ascendente
              </button>
              <button
                class="w-full text-left px-4 py-2 hover:bg-gray-100"
                @click="setSort('desc')"
              >
                Orden descendente
              </button>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
          <div v-for="product in paginatedProducts" :key="product.id" class="cursor-pointer">
            <a :href="`/producto/${product.id}`">
                <div
                  class="bg-white rounded-xl border border-gray-200 p-4 flex flex-col items-center text-center h-full min-h-[220px] transition-all duration-300 transform hover:scale-[1.03] hover:shadow-xl relative overflow-hidden shadow-xl"
                >
                  <div class="mb-4 flex-shrink-0 flex items-center justify-center w-full h-[100px] mt-2">
                    <img :src="product.imageSrc" :alt="product.name" class="max-w-full max-h-full object-contain" />
                  </div>
                  <h3 class="text-base font-bold text-gray-800 leading-tight mt-auto">{{ product.name }}</h3>
                  <p class="text-sm text-gray-500 mt-1 mb-2">{{ product.description }}</p>
                </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Paginador -->
    <div class="flex justify-center items-center mt-12 space-x-1 sm:space-x-2 mx-auto">
      <button
        @click="goToPage(currentPage - 1)"
        :disabled="currentPage === 1"
        class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 disabled:opacity-50"
      >
        «
      </button>
      <button
        v-for="page in totalPages"
        :key="page"
        @click="goToPage(page)"
        :class="[
          'flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full text-sm sm:text-base',
          currentPage === page ? 'bg-primary text-white font-bold shadow-lg' : 'border border-primary text-gray-700 hover:bg-gray-100'
        ]"
      >
        {{ page }}
      </button>
      <button
        @click="goToPage(currentPage + 1)"
        :disabled="currentPage === totalPages"
        class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 disabled:opacity-50"
      >
        »
      </button>
    </div>

    <!-- Drawer móvil + Backdrop -->
    <!-- Backdrop -->
    <div v-if="openFilterMenu" class="fixed inset-0 z-40" aria-hidden="true">
      <div class="absolute inset-0 bg-black/30  bg-opacity-50" @click="closeMobileFilter"></div>
    </div>

    <!-- Drawer (siempre en DOM para animar transform) -->
    <div
      class="fixed inset-y-0 right-0 w-full max-w-[300px] bg-white shadow-xl transform transition-transform duration-300 z-50"
      :class="openFilterMenu ? 'translate-x-0' : 'translate-x-full'"
      role="dialog"
      aria-modal="true"
    >
      <div class="flex justify-between items-center p-4 border-b shadow-sm">
        <h3 class="text-xl font-bold flex items-center text-gray-800">Filtrar Productos</h3>
        <button @click="closeMobileFilter" class="text-gray-500 hover:text-gray-900">✕</button>
      </div>

      <div class="p-4 overflow-y-auto h-full pb-32">
        <div v-for="(options, filterName) in filters" :key="'mobile-'+filterName" class="border-t pt-4">
          <button
            @click="toggleFilter(filterName)"
            class="w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group"
          >
            {{ filterName }}
            <span>{{ openFilters.includes(filterName) ? '▲' : '▼' }}</span>
          </button>

          <div v-show="openFilters.includes(filterName)" class="mt-2 space-y-1">
            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 space-y-1">
              <a
                v-for="option in options"
                :key="filterName + '-' + option"
                href="#"
                class="flex items-center justify-between text-gray-800 hover:text-blue-700 transition-colors p-2 rounded-md hover:bg-white"
                @click.prevent="toggleSubFilter(filterName, option)"
              >
                <span>{{ option }}</span>
                <input type="checkbox" class="rounded text-blue-700 w-4 h-4" :checked="selectedFilters[filterName]?.includes(option)" />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t flex justify-between space-x-4 shadow-2xl">
        <button
          @click="clearFilters"
          class="w-1/2 py-3 text-lg font-semibold text-primary bg-[#00FFC3] rounded-md"
        >
          Limpiar
        </button>
        <button
          @click="applyAndClose"
          class="w-1/2 py-3 text-lg font-semibold text-white bg-primary rounded-md hover:bg-blue-800 transition-colors"
        >
          Aplicar
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from "vue";

const filters = ref({
  Categoría: ["Dispositivos médicos", "Ofertas"],
  Marca: ["3M", "B. Braun", "Johnson & Johnson"],
  Tipo: ["Cintas", "Gasa", "Suturas"],
  Especialidad: [
    "Cirugía",
    "Desinfección",
    "Drenaje",
    "Emergencia",
    "Esterilización",
    "Ginecología",
    "Laboratorio",
    "Medición",
    "Oxígeno Terapia",
    "Protección",
    "Rehabilitación",
  ],
});

// --- Productos base variados ---
const baseProducts = [
  {
    idOriginal: 1,
    name: "Transpore 3M 1527-3",
    description: "Cinta médica hipoalergénica de uso quirúrgico",
    imageSrc: "/images/product/product1.png",
    category: "Dispositivos médicos",
    brand: "3M",
    type: "Cintas",
    specialty: "Cirugía",
  },
  {
    idOriginal: 2,
    name: "Micropore 3M Blanco",
    description: "Cinta adhesiva transpirable para fijación",
    imageSrc: "/images/product/product2.png",
    category: "Ofertas",
    brand: "3M",
    type: "Cintas",
    specialty: "Laboratorio",
  },
  {
    idOriginal: 3,
    name: "Gasa Estéril 10x10 cm",
    description: "Gasa absorbente para cubrir heridas",
    imageSrc: "/images/product/product3.png",
    category: "Dispositivos médicos",
    brand: "B. Braun",
    type: "Gasa",
    specialty: "Emergencia",
  },
  {
    idOriginal: 4,
    name: "Steri Strip Adhesivo",
    description: "Tira adhesiva para cierre de pequeñas heridas",
    imageSrc: "/images/product/product4.png",
    category: "Ofertas",
    brand: "Johnson & Johnson",
    type: "Suturas",
    specialty: "Protección",
  },
  {
    idOriginal: 5,
    name: "Esparadrapo B. Braun Classic",
    description: "Cinta médica de fijación fuerte",
    imageSrc: "/images/product/product2.png",
    category: "Dispositivos médicos",
    brand: "B. Braun",
    type: "Cintas",
    specialty: "Rehabilitación",
  },
  {
    idOriginal: 6,
    name: "Gasa Johnson Multiuso",
    description: "Ideal para curaciones en emergencia",
    imageSrc: "/images/product/product1.png",
    category: "Ofertas",
    brand: "Johnson & Johnson",
    type: "Gasa",
    specialty: "Emergencia",
  },
  {
    idOriginal: 7,
    name: "Sutura absorbible 3M",
    description: "Sutura quirúrgica de rápida absorción",
    imageSrc: "/images/product/product3.png",
    category: "Dispositivos médicos",
    brand: "3M",
    type: "Suturas",
    specialty: "Cirugía",
  },
  {
    idOriginal: 8,
    name: "Sutura no absorbible B. Braun",
    description: "Resistente, indicada para cirugía general",
    imageSrc: "/images/product/product4.png",
    category: "Dispositivos médicos",
    brand: "B. Braun",
    type: "Suturas",
    specialty: "Esterilización",
  },
];

// --- Generamos más productos (variando nombre y orden de imágenes) ---
const products = ref([]);
let idCounter = 1;
for (let i = 0; i < 5; i++) {
  baseProducts.forEach((p, idx) => {
    products.value.push({
      ...p,
      id: idCounter++,
      originalid: idx + 1,
      name: p.name + " Lote " + (i + 1),
      imageSrc: `/images/product/product${((idx + i) % 4) + 1}.png`, // rota imágenes
    });
  });
}

// --- Estado de filtros ---
const openFilters = ref([]); // desplegables abiertos (pueden ser varios)
const selectedFilters = ref({}); // { "Marca": ["3M", "B. Braun"], "Categoría": ["Ofertas"] }

// Mobile drawer state
const openFilterMenu = ref(false);

const toggleFilter = (name) => {
  if (openFilters.value.includes(name)) {
    openFilters.value = openFilters.value.filter((f) => f !== name);
  } else {
    openFilters.value.push(name);
  }
};

const toggleSubFilter = (filterName, option) => {
  if (!selectedFilters.value[filterName]) {
    selectedFilters.value[filterName] = [];
  }
  if (selectedFilters.value[filterName].includes(option)) {
    selectedFilters.value[filterName] = selectedFilters.value[filterName].filter((o) => o !== option);
  } else {
    selectedFilters.value[filterName].push(option);
  }
  // cuando cambian filtros, volver a página 1
  currentPage.value = 1;
};

// --- Productos filtrados ---
const filteredProducts = computed(() => {
  let results = products.value;
  Object.entries(selectedFilters.value).forEach(([filterName, options]) => {
    if (options && options.length > 0) {
      const key = mapFilterKey(filterName);
      if (key) results = results.filter((p) => options.includes(p[key]));
    }
  });
  return results;
});

const mapFilterKey = (filterName) => {
  switch (filterName) {
    case "Categoría":
      return "category";
    case "Marca":
      return "brand";
    case "Tipo":
      return "type";
    case "Especialidad":
      return "specialty";
    default:
      return "";
  }
};

// --- Paginador ---
const currentPage = ref(1);
const pageSize = 8;
const totalPages = computed(() => Math.max(1, Math.ceil(sortedProducts.value.length / pageSize)));

const paginatedProducts = computed(() => {
  const start = (currentPage.value - 1) * pageSize;
  return sortedProducts.value.slice(start, start + pageSize);
});

const goToPage = (page) => {
  if (page >= 1 && page <= totalPages.value) currentPage.value = page;
};

// --- Mobile drawer functions ---
const toggleMobileFilter = () => {
  openFilterMenu.value = !openFilterMenu.value;
};

const closeMobileFilter = () => {
  openFilterMenu.value = false;
};

// Aplica (cierra drawer). Los filtros están aplicados en vivo.
const applyAndClose = () => {
  closeMobileFilter();
};

// Limpiar filtros
const clearFilters = () => {
  // reset selected filters
  Object.keys(selectedFilters.value).forEach((k) => {
    selectedFilters.value[k] = [];
  });
  // mejor asignar nuevo objeto vacío para reset total
  selectedFilters.value = {};
  currentPage.value = 1;
};
const sortOrder = ref("asc");
const openSortMenu = ref(false);

const toggleSortMenu = () => {
  openSortMenu.value = !openSortMenu.value;
};

const setSort = (order) => {
  sortOrder.value = order;
  openSortMenu.value = false;
};

const sortLabel = computed(() => {
  if (sortOrder.value === "asc") return "Orden ascendente";
  if (sortOrder.value === "desc") return "Orden descendente";
  return "Orden predeterminado";
});

// --- Productos ordenados ---
const sortedProducts = computed(() => {
  let results = [...filteredProducts.value];
  if (sortOrder.value === "asc") {
    results.sort((a, b) => a.name.localeCompare(b.name));
  } else if (sortOrder.value === "desc") {
    results.sort((a, b) => b.name.localeCompare(a.name));
  }
  return results;
});

// Bloquear scroll del body cuando drawer abierto
watch(openFilterMenu, (val) => {
  if (val) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

// cerrar con Escape y cleanup
function onKeyDown(e) {
  if (e.key === "Escape" && openFilterMenu.value) {
    closeMobileFilter();
  }
}

onMounted(() => {
  window.addEventListener("keydown", onKeyDown);
});

onUnmounted(() => {
  window.removeEventListener("keydown", onKeyDown);
  // asegurar desbloqueo de scroll si componente se desmonta
  document.body.style.overflow = "";
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
