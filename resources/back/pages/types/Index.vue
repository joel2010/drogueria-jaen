<script setup lang="ts">
import { More, Plus } from '@element-plus/icons-vue';
import { onMounted, ref } from 'vue';
import ModalCreateEdit from './ModalCreateEdit.vue';
import { storeToRefs } from 'pinia';
import CustomSiNo from '../../components/CustomSiNo.vue';
import { ElMessageBox, ElNotification } from 'element-plus';
import { successAxiosTitle } from '../../utils/consts';
import { useTypesStore } from '../../store/types';

const typesStore = useTypesStore()

const { showModal, record, records } = storeToRefs(typesStore)
const loading = ref(false)

const onOpenModal = () => {
    record.value = null
    showModal.value = true
}

const onGetRecords = async () => {
    loading.value = true
    await typesStore.onGetRecords().finally(() => loading.value = false)
}

const onEditRow = (row: any) => {
    record.value = row
    showModal.value = true
}

const onDeleteRow = (row: any) => {
    ElMessageBox.confirm(
        `¿Estas seguro de eliminar el tipo seleccionado: ${row.name}?`,
        'Cuidado',
        {
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            type: 'warning',
        }
    )
        .then(async () => {
            loading.value = true
            const response = await typesStore.onDelete(row.id).finally(() => loading.value = false)
            ElNotification({
                title: successAxiosTitle,
                message: response.data.message,
                type: 'success',
            })
            await typesStore.onGetRecords()
        })
        .catch(() => { })
}

onMounted(async () => {
    await onGetRecords()
})
</script>

<template>
    <el-card v-loading="loading">
        <template #header>
            <div class="flex items-center justify-between">
                <span>Tipo</span>
                <div class="ml-auto">
                    <el-button type="primary" @click="onOpenModal">
                        <el-icon>
                            <Plus />
                        </el-icon>
                    </el-button>
                </div>
            </div>
        </template>
        <el-table :data="records">
            <el-table-column prop="name" label="Nombre" width="300" />
            <el-table-column label="Mostrar" width="180">
                <template #default="scope">
                    <CustomSiNo :active="scope.row.active" />
                </template>
            </el-table-column>
            <el-table-column prop="created_at" label="Fecha de creación" />
            <el-table-column label="" width="60">
                <template #default="scope">
                    <el-dropdown trigger="click" placement="bottom-end">
                        <el-button type="primary" :icon="More" circle>
                        </el-button>
                        <template #dropdown>
                            <el-dropdown-menu>
                                <el-dropdown-item @click="onEditRow(scope.row)">Editar</el-dropdown-item>
                                <el-dropdown-item divided @click="onDeleteRow(scope.row)">Eliminar</el-dropdown-item>
                            </el-dropdown-menu>
                        </template>
                    </el-dropdown>
                </template>
            </el-table-column>
        </el-table>
    </el-card>
    <ModalCreateEdit />
</template>