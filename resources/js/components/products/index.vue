<template>
  <div class="max-w-desktop mx-auto py-8">
    <!-- Header móvil -->
    <div
      class="mx-4 flex flex-col md:flex-row justify-between items-start sm:items-center mb-6 border-b border-gray-400 pb-4 md:hidden">
      <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Productos</h1>
      <div class="flex space-x-4 w-full md:w-auto justify-between">
        <button @click="toggleMobileFilter"
          class="flex items-center max-w-max justify-center px-4 py-1 text-sm border border-primary rounded-md bg-white text-primary flex-grow md:flex-grow-0 shadow-sm transition-colors">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18v3L12 14v8H8v-8L3 7V4z" />
          </svg>
          <span class="text-primary">Filtrar</span>
        </button>

        <div class="relative">
          <button @click="toggleSortMenu"
            class="flex items-center w-full bg-white text-primary border border-primary text-sm py-1 px-5 md:py-2 md:px-8 rounded-md transition-colors duration-300 max-w-max">
            <span>{{ params.sort }}</span>
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Popover -->
          <div v-show="openSortMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
            <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
              @click="onSetFilter('sort', 'Orden por defecto')">
              Orden por defecto
            </button>
            <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
              @click="onSetFilter('sort', 'Nombres ascendente')">
              Nombres ascendente
            </button>
            <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
              @click="onSetFilter('sort', 'Nombres descendente')">
              Nombres descendente
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenedor principal -->
    <div class="md:grid md:grid-cols-[280px_1fr] md:gap-10 max-width mx-auto">
      <!-- Sidebar desktop -->
      <aside
        class="hidden md:block space-y-0 bg-[#F3F3F3] border p-4 border-gray-200 rounded-xl shadow-lg overflow-hidden sticky top-8 h-full">
        <div class="border-t border-gray-200 mb-2">
          <button @click="toggleFilter('category')"
            class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary"
            :class="{
              'bg-primary text-[#00FFC3]': openFilters.includes('category'),
              'hover:bg-gray-100': !openFilters.includes('category')
            }">
            Categoría
            <svg class="w-4 h-4 transition-transform duration-300" :class="{
              'text-[#00FFC3] rotate-90': openFilters.includes('category'),
              'text-gray-500': !openFilters.includes('category')
            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <div v-show="openFilters.includes('category')"
            class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out">
            <div class="space-y-0 py-1">
              <a v-for="(item, index) in categories" :key="index" href="#"
                @click.prevent="onSetFilter('category_id', item.id)"
                class="text-gray-800 p-2 py-1 text-[12px] flex gap-2 items-center transition-colors" :class="{
                  'bg-gray-200 text-primary font-semibold': params.category_id === item.id,
                  'hover:bg-gray-100': params.category_id !== item.id
                }">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ item.name }}
              </a>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-200 mb-2">
          <button @click="toggleFilter('brand')"
            class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary"
            :class="{
              'bg-primary text-[#00FFC3]': openFilters.includes('brand'),
              'hover:bg-gray-100': !openFilters.includes('brand')
            }">
            Marca
            <svg class="w-4 h-4 transition-transform duration-300" :class="{
              'text-[#00FFC3] rotate-90': openFilters.includes('brand'),
              'text-gray-500': !openFilters.includes('brand')
            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <div v-show="openFilters.includes('brand')"
            class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out">
            <div class="space-y-0 py-1">
              <a v-for="(item, index) in brands" :key="index" href="#" @click.prevent="onSetFilter('brand_id', item.id)"
                class="text-gray-800 p-2 py-1 text-[12px] flex gap-2 items-center transition-colors" :class="{
                  'bg-gray-200 text-primary font-semibold': params.brand_id === item.id,
                  'hover:bg-gray-100': params.brand_id !== item.id
                }">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ item.name }}
              </a>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-200 mb-2">
          <button @click="toggleFilter('type')"
            class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary"
            :class="{
              'bg-primary text-[#00FFC3]': openFilters.includes('type'),
              'hover:bg-gray-100': !openFilters.includes('type')
            }">
            Tipo
            <svg class="w-4 h-4 transition-transform duration-300" :class="{
              'text-[#00FFC3] rotate-90': openFilters.includes('type'),
              'text-gray-500': !openFilters.includes('type')
            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <div v-show="openFilters.includes('type')"
            class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out">
            <div class="space-y-0 py-1">
              <a v-for="(item, index) in types" :key="index" href="#" @click.prevent="onSetFilter('type_id', item.id)"
                class="text-gray-800 p-2 py-1 text-[12px] flex gap-2 items-center transition-colors" :class="{
                  'bg-gray-200 text-primary font-semibold': params.type_id === item.id,
                  'hover:bg-gray-100': params.type_id !== item.id
                }">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ item.name }}
              </a>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-200 mb-2">
          <button @click="toggleFilter('specialty')"
            class="filter-toggle w-full flex items-center mb-1 justify-between p-3 py-1 text-[16px] transition-colors border-[1px] border-primary"
            :class="{
              'bg-primary text-[#00FFC3]': openFilters.includes('specialty'),
              'hover:bg-gray-100': !openFilters.includes('specialty')
            }">
            Especialidad
            <svg class="w-4 h-4 transition-transform duration-300" :class="{
              'text-[#00FFC3] rotate-90': openFilters.includes('specialty'),
              'text-gray-500': !openFilters.includes('specialty')
            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <div v-show="openFilters.includes('specialty')"
            class="filter-content p-0 border-b border-gray-200 bg-white transition-all duration-300 ease-in-out">
            <div class="space-y-0 py-1">
              <a v-for="(item, index) in specialties" :key="index" href="#"
                @click.prevent="onSetFilter('specialty_id', item.id)"
                class="text-gray-800 p-2 py-1 text-[12px] flex gap-2 items-center transition-colors" :class="{
                  'bg-gray-200 text-primary font-semibold': params.specialty_id === item.id,
                  'hover:bg-gray-100': params.specialty_id !== item.id
                }">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ item.name }}
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
            <button @click="toggleSortMenu"
              class="flex items-center w-full bg-primary text-white font-semibold py-1 px-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 max-w-max">
              <span>{{ params.sort }}</span>
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Popover -->
            <div v-show="openSortMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-2xl z-50">
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
                @click="onSetFilter('sort', 'Orden por defecto')">
                Orden por defecto
              </button>
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
                @click="onSetFilter('sort', 'Nombres ascendente')">
                Nombres ascendente
              </button>
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100"
                @click="onSetFilter('sort', 'Nombres descendente')">
                Nombres descendente
              </button>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
          <div v-for="product in records" :key="product.id" class="cursor-pointer">
            <a :href="product.url">
              <div
                class="bg-white rounded-xl border border-gray-200 p-4 flex flex-col items-center text-center h-full min-h-[220px] transition-all duration-300 transform hover:scale-[1.03] hover:shadow-xl relative overflow-hidden shadow-xl">
                <div class="mb-4 flex-shrink-0 flex items-center justify-center w-full h-[100px] mt-2">
                  <img :src="product.cover?.path" :alt="product.name" class="max-w-full max-h-full object-contain" />
                </div>
                <h3 class="text-base font-bold text-gray-800 leading-tight mt-auto">{{ product.name }}</h3>
                <p class="text-sm text-gray-500 mt-1 mb-2">{{ product.subtitle }}</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Paginador -->
    <div class="flex justify-center items-center mt-12 space-x-1 sm:space-x-2 mx-auto">
      <button @click="goToPage(1)" :disabled="params.page === 1"
        class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 disabled:opacity-50">
        «
      </button>
      <button v-for="page in paginator.last_page" :key="page" @click="goToPage(page)" :class="[
        'flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full text-sm sm:text-base',
        params.page === page ? 'bg-primary text-white font-bold shadow-lg' : 'border border-primary text-gray-700 hover:bg-gray-100'
      ]">
        {{ page }}
      </button>
      <button @click="goToPage(paginator.last_page)" :disabled="params.page === paginator.last_page"
        class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 border border-gray-300 rounded-full text-gray-500 disabled:opacity-50">
        »
      </button>
    </div>

    <!-- Drawer móvil + Backdrop -->
    <!-- Backdrop -->
    <div v-if="openFilterMenu" class="fixed inset-0 z-40" aria-hidden="true">
      <div class="absolute inset-0 bg-black/30 bg-opacity-50" @click="closeMobileFilter"></div>
    </div>

    <!-- Drawer (siempre en DOM para animar transform) -->
    <div
      class="fixed inset-y-0 right-0 w-full max-w-[300px] bg-white shadow-xl transform transition-transform duration-300 z-50"
      :class="openFilterMenu ? 'translate-x-0' : 'translate-x-full'" role="dialog" aria-modal="true">
      <div class="flex justify-between items-center p-4 border-b shadow-sm">
        <h3 class="text-xl font-bold flex items-center text-gray-800">Filtrar Productos</h3>
        <button @click="closeMobileFilter" class="text-gray-500 hover:text-gray-900">✕</button>
      </div>

      <div class="overflow-y-auto h-full pb-32">
        <!-- Categorías -->
        <div class="border-t">
          <button @click="toggleFilter('category')"
            :class="openFilters.includes('category')
              ? 'w-full flex items-center justify-between text-lg font-bold text-[#00FFC3] bg-primary py-2 group p-4'
              : 'w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group p-4'">
            Categoría
            <span>{{ openFilters.includes('category') ? '▲' : '▼' }}</span>
          </button>

          <div v-show="openFilters.includes('category')" class="mt-2 space-y-1 px-4">
            <div class="space-y-1">
              <a v-for="item in categories" :key="'mobile-cat-' + item.id" href="#"
                :class="[
                  'flex items-center gap-2 text-gray-800 hover:text-blue-700 transition-colors py-1 rounded-md hover:bg-white',
                  tempFilters.category_id === item.id ? 'text-primary' : ''
                ]"                @click.prevent="toggleMobileSubFilter('category_id', item.id)">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span>{{ item.name }}</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Marcas -->
        <div class="border-t">
          <button @click="toggleFilter('brand')"
            :class="openFilters.includes('brand')
              ? 'w-full flex items-center justify-between text-lg font-bold text-[#00FFC3] bg-primary py-2 group p-4'
              : 'w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group p-4'">
            Marca
            <span>{{ openFilters.includes('brand') ? '▲' : '▼' }}</span>
          </button>

          <div v-show="openFilters.includes('brand')" class="mt-2 space-y-1">
            <div class="space-y-1  px-4">
              <a v-for="item in brands" :key="'mobile-brand-' + item.id" href="#"
                :class="[
                  'flex items-center gap-2 text-gray-800 hover:text-blue-700 transition-colors py-1 rounded-md hover:bg-white',
                  tempFilters.brand_id === item.id ? 'text-primary' : ''
                ]"                @click.prevent="toggleMobileSubFilter('brand_id', item.id)">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span>{{ item.name }}</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Tipos -->
        <div class="border-t">
          <button @click="toggleFilter('type')"
            :class="openFilters.includes('type')
              ? 'w-full flex items-center justify-between text-lg font-bold text-[#00FFC3] bg-primary py-2 group p-4'
              : 'w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group p-4'">
            Tipo
            <span>{{ openFilters.includes('type') ? '▲' : '▼' }}</span>
          </button>

          <div v-show="openFilters.includes('type')" class="mt-2 space-y-1">
            <div class="space-y-1  px-4">
              <a v-for="item in types" :key="'mobile-type-' + item.id" href="#"
                :class="[
                  'flex items-center gap-2 text-gray-800 hover:text-blue-700 transition-colors py-1 rounded-md hover:bg-white',
                  tempFilters.type_id === item.id ? 'text-primary' : ''
                ]"
                @click.prevent="toggleMobileSubFilter('type_id', item.id)">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span>{{ item.name }}</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Especialidades -->
        <div class="border-t">
          <button @click="toggleFilter('specialty')"
           :class="openFilters.includes('specialty')
              ? 'w-full flex items-center justify-between text-lg font-bold text-[#00FFC3] bg-primary py-2 group p-4'
              : 'w-full flex items-center justify-between text-lg font-bold text-gray-800 py-2 group p-4'">
            Especialidad
            <span>{{ openFilters.includes('specialty') ? '▲' : '▼' }}</span>
          </button>

          <div v-show="openFilters.includes('specialty')" class="space-y-1">
            <div class="space-y-1 px-4">
              <a v-for="item in specialties" :key="'mobile-spec-' + item.id" href="#"
                :class="[
                  'flex items-center gap-2 text-gray-800 hover:text-blue-700 transition-colors py-1 rounded-md hover:bg-white',
                  tempFilters.specialty_id === item.id ? 'text-primary' : ''
                ]"
                @click.prevent="toggleMobileSubFilter('specialty_id', item.id)">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span>{{ item.name }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t flex justify-between space-x-4 shadow-2xl">
        <button @click="clearFilters" class="w-1/2 py-3 text-lg font-semibold text-primary bg-[#00FFC3] rounded-md">
          Limpiar
        </button>
        <button @click="applyAndClose"
          class="w-1/2 py-3 text-lg font-semibold text-white bg-primary rounded-md hover:bg-blue-800 transition-colors">
          Aplicar
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, watch, onMounted, onUnmounted } from "vue";

const props = defineProps({
  categories: {
    type: Array,
    default: () => []
  },
  types: {
    type: Array,
    default: () => []
  },
  specialties: {
    type: Array,
    default: () => []
  },
  brands: {
    type: Array,
    default: () => []
  },
});

// Estado de paginación y productos
const paginator = ref({
  per_page: 1,
  total: 1,
  last_page: 1,
});
const records = ref([]);

// Parámetros de búsqueda
const params = ref({
  category_id: '',
  type_id: '',
  brand_id: '',
  specialty_id: '',
  page: 1,
  sort: 'Orden por defecto'
});

// Estado de filtros desktop
const openFilters = ref([]);

// Filtros temporales para mobile (antes de aplicar)
const tempFilters = ref({
  category_id: '',
  type_id: '',
  brand_id: '',
  specialty_id: ''
});

// Estado del drawer mobile
const openFilterMenu = ref(false);

// Estado del menú de ordenamiento
const openSortMenu = ref(false);

// Función para obtener productos de la API
const onGetRecords = async () => {
  try {
    const response = await axios.get('/productos', { params: params.value });
    records.value = response.data.data;
    paginator.value = response.data.meta;
  } catch (error) {
    console.error('Error al obtener productos:', error);
  }
};

// Establecer filtro (para desktop y ordenamiento)
const onSetFilter = async (param, value) => {
  if (param === 'sort') {
    params.value[param] = value;
    openSortMenu.value = false;
  } else {
    // Si es el mismo filtro, lo limpiamos
    if (params.value[param] === value) {
      params.value[param] = '';
    } else {
      params.value[param] = value;
    }
  }
  params.value.page = 1;
  await onGetRecords();
};

// Toggle para abrir/cerrar secciones de filtros
const toggleFilter = (name) => {
  if (openFilters.value.includes(name)) {
    openFilters.value = openFilters.value.filter((f) => f !== name);
  } else {
    openFilters.value.push(name);
  }
};

// Toggle para filtros en mobile (solo actualiza temporales)
const toggleMobileSubFilter = (paramKey, value) => {
  // Si es el mismo valor, lo desmarcamos
  if (tempFilters.value[paramKey] === value) {
    tempFilters.value[paramKey] = '';
  } else {
    tempFilters.value[paramKey] = value;
  }
};

// Paginación
const goToPage = async (page) => {
  params.value.page = page;
  await onGetRecords();
};

// Abrir drawer mobile
const toggleMobileFilter = () => {
  if (!openFilterMenu.value) {
    // Al abrir, copiar filtros actuales a temporales
    tempFilters.value = { ...params.value };
  }
  openFilterMenu.value = !openFilterMenu.value;
};

// Cerrar drawer mobile
const closeMobileFilter = () => {
  openFilterMenu.value = false;
};

// Aplicar filtros temporales y cerrar drawer
const applyAndClose = async () => {
  // Copiar filtros temporales a params
  params.value.category_id = tempFilters.value.category_id || '';
  params.value.type_id = tempFilters.value.type_id || '';
  params.value.brand_id = tempFilters.value.brand_id || '';
  params.value.specialty_id = tempFilters.value.specialty_id || '';

  params.value.page = 1;
  await onGetRecords();
  closeMobileFilter();
};

// Limpiar todos los filtros
const clearFilters = async () => {
  // Limpiar filtros temporales (mobile)
  tempFilters.value = {
    category_id: '',
    type_id: '',
    brand_id: '',
    specialty_id: ''
  };

  // Limpiar parámetros reales
  params.value.category_id = '';
  params.value.type_id = '';
  params.value.brand_id = '';
  params.value.specialty_id = '';
  params.value.page = 1;

  await onGetRecords();
};

// Toggle menú de ordenamiento
const toggleSortMenu = () => {
  openSortMenu.value = !openSortMenu.value;
};

// Bloquear scroll del body cuando drawer abierto
watch(openFilterMenu, (val) => {
  if (val) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

// Cerrar drawer con tecla Escape
function onKeyDown(e) {
  if (e.key === "Escape") {
    if (openFilterMenu.value) {
      closeMobileFilter();
    }
    if (openSortMenu.value) {
      openSortMenu.value = false;
    }
  }
}

// Lifecycle hooks
onMounted(async () => {
  window.addEventListener("keydown", onKeyDown);
  await onGetRecords();
});

onUnmounted(() => {
  window.removeEventListener("keydown", onKeyDown);
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
