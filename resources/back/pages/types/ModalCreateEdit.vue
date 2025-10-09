<template>
    <form @submit.prevent="onSubmit">
        <el-dialog v-model="showModal" :title="title" width="400" @open="onOpen" :close-on-click-modal="false">
            <div class="form-group">
                <label for="name">Nombre del tipo</label>
                <el-input v-model="name" id="name"></el-input>
                <span v-if="errors.name" class="error">{{ errors.name }}</span>
            </div>
            <div class="form-group flex items-center justify-between">
                <label for="active">Mostrar tipo</label>
                <el-switch v-model="active" id="active"></el-switch>
            </div>
            <template #footer>
                <div class="dialog-footer">
                    <el-button class="w-full" type="primary" native-type="submit" :loading="loading"
                        :disabled="loading">
                        Guardar
                    </el-button>
                </div>
            </template>
        </el-dialog>
    </form>
</template>
<script setup>
import { storeToRefs } from 'pinia';
import { ref } from 'vue';
import { useForm } from 'vee-validate';
import { bool, string } from 'yup';
import { successAxiosTitle } from '../../utils/consts';
import { useErrorsBackend } from '../../utils/useErrorsBackend';
import { ElNotification } from 'element-plus';
import { useTypesStore } from '../../store/types';

const typesStore = useTypesStore()
const { onCatchAxiosError } = useErrorsBackend()

const { showModal, record } = storeToRefs(typesStore)
const title = ref('')
const { errors, defineField, handleSubmit, setFieldError } = useForm({
    validationSchema: {
        name: string().required().max(150).label('Nombre'),
        active: bool().required().label('Mostrar tipo'),
    }
})
const [name] = defineField('name')
const [active] = defineField('active')
const loading = ref(false)

const onOpen = async () => {
    if (record.value) {
        title.value = 'Editar tipo'
        const response = await typesStore.onShow(record.value.id)
        onSetDefaultData(response.data.data)
    } else {
        title.value = 'Crear tipo'
        onSetDefaultData()
    }
}

const onSetDefaultData = (data = null) => {
    name.value = data ? data.name : ''
    active.value = data ? data.active : true
}

const onSubmit = handleSubmit(async (values) => {
    loading.value = true
    try {
        const response = record.value ? await typesStore.onUpdate(record.value.id, values) : await typesStore.onStore(values)
        ElNotification({
            title: successAxiosTitle,
            message: response.data.message,
            type: 'success',
        })
        showModal.value = false
        await typesStore.onGetRecords()
    } catch (err) {
        onCatchAxiosError(err, setFieldError)
    } finally {
        loading.value = false
    }
})
</script>