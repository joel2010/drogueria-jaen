<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useContactsStore } from '../../store/contacts';

const contactsStore = useContactsStore()

const { records, paginator, filters } = storeToRefs(contactsStore)
const loading = ref(false)

const onGetRecords = async () => {
    loading.value = true
    await contactsStore.onGetRecords().finally(() => loading.value = false)
}

const onChangePage = async (page) => {
    filters.value.page = page
    await onGetRecords()
}

onMounted(async () => {
    await onGetRecords()
})
</script>

<template>
    <el-card v-loading="loading">
        <template #header>
            <div class="flex items-center justify-between">
                <span>Datos del formulario de contacto</span>
                <div class="ml-auto">
                    <el-popover placement="bottom-end" :width="300" trigger="click">
                        <template #reference>
                            <el-button>Buscar</el-button>
                        </template>
                        <form @submit.prevent="onGetRecords">
                            <div class="form-group">
                                <el-input v-model="filters.name" placeholder="Nombre"></el-input>
                            </div>
                            <div class="form-group">
                                <el-input v-model="filters.document" placeholder="Núm de documento"></el-input>
                            </div>
                            <div class="form-group">
                                <el-input v-model="filters.email" placeholder="Correo"></el-input>
                            </div>
                            <el-button native-type="submit" class="w-full" type="primary">Buscar</el-button>
                        </form>
                    </el-popover>
                </div>
            </div>
        </template>
        <el-table :data="records">
            <el-table-column label="Nombre" width="200">
                <template #default="scope">
                    <strong>{{ scope.row.name }}</strong><br>
                    <span>{{ scope.row.document }}</span>
                </template>
            </el-table-column>
            <el-table-column label="Teléfono" width="100">
                <template #default="scope">
                    <a :href="`tel:${scope.row.phone}`">{{ scope.row.phone }}</a>
                </template>
            </el-table-column>
            <el-table-column label="Correo electónico" width="200">
                <template #default="scope">
                    <a :href="`mailto:${scope.row.email}`">{{ scope.row.email }}</a>
                </template>
            </el-table-column>
            <el-table-column label="Mensaje" width="300">
                <template #default="scope">
                    <div>{{ scope.row.message }}</div>
                </template>
            </el-table-column>
            <el-table-column prop="created_at" label="Fecha de creación" />
        </el-table>
        <br>
        <el-pagination background layout="total, prev, pager, next" :page-size="paginator.per_page"
            :total="paginator.total" @current-change="onChangePage" />
    </el-card>
</template>