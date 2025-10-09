<template>
    <form @submit.prevent="onSubmit">
        <el-dialog v-model="showModal" :title="titleModal" width="400" @open="onOpen" :close-on-click-modal="false">
            <div class="form-group">
                <label for="title">Título del banner</label>
                <el-input v-model="title" id="title"></el-input>
                <span v-if="errors.title" class="error">{{ errors.title }}</span>
            </div>
            <div class="form-group">
                <label>Imágen para escritorio</label>
                <ul class="files small" v-if="file.file_path">
                    <li>
                        <img :src="file.file_path" alt="Imagen para escritorio">
                        <div class="files__btns">
                            <el-button type="danger" circle @click="onDeleteImage">
                                <el-icon>
                                    <Delete />
                                </el-icon>
                            </el-button>
                        </div>
                    </li>
                </ul>
                <el-upload drag :auto-upload="false" action="#" :on-change="onChangeFiles" :show-file-list="false">
                    <el-icon class="el-icon--upload">
                        <UploadFilled />
                    </el-icon>
                    <div class="el-upload__text">
                        Suelte el archivo aquí o <em>haga clic para cargarlo</em>
                    </div>
                    <template #tip>
                        <div class="text-center">
                            Archivos jpg/png con un tamaño inferior a 1 MB
                        </div>
                    </template>
                </el-upload>
            </div>
            <div class="form-group">
                <label>Imágen para celular</label>
                <ul class="files small" v-if="fileMobile.file_path">
                    <li>
                        <img :src="fileMobile.file_path" alt="Imagen para moviles`">
                        <div class="files__btns">
                            <el-button type="danger" circle @click="onDeleteMobileImage">
                                <el-icon>
                                    <Delete />
                                </el-icon>
                            </el-button>
                        </div>
                    </li>
                </ul>
                <el-upload drag :auto-upload="false" action="#" :on-change="onChangeMobileFiles"
                    :show-file-list="false">
                    <el-icon class="el-icon--upload">
                        <UploadFilled />
                    </el-icon>
                    <div class="el-upload__text">
                        Suelte el archivo aquí o <em>haga clic para cargarlo</em>
                    </div>
                    <template #tip>
                        <div class="text-center">
                            Archivos jpg/png con un tamaño inferior a 1 MB
                        </div>
                    </template>
                </el-upload>
            </div>
            <div class="form-group">
                <label for="sort">Ubicación</label>
                <el-input v-model="sort" id="sort"></el-input>
                <span v-if="errors.sort" class="error">{{ errors.sort }}</span>
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
import { number, string } from 'yup';
import { successAxiosTitle } from '../../utils/consts';
import { useErrorsBackend } from '../../utils/useErrorsBackend';
import { ElNotification } from 'element-plus';
import { useFilesStore } from '../../store/files';
import { Delete, UploadFilled } from '@element-plus/icons-vue';
import { useBannersStore } from '../../store/banners';

const file = ref({})
const onChangeFiles = (fileSelected) => {
    file.value = {
        id: null,
        raw: fileSelected.raw,
        file_path: URL.createObjectURL(fileSelected.raw)
    }
}
const fileMobile = ref({})
const onChangeMobileFiles = (file) => {
    fileMobile.value = {
        id: null,
        raw: file.raw,
        file_path: URL.createObjectURL(file.raw)
    }
}
const onDeleteImage = async () => {
    if (file.value.id) {
        await fileStore.onDelete(file.value.id)
    }
    file.value = {}
}
const onDeleteMobileImage = async () => {
    if (fileMobile.value.id) {
        await fileStore.onDelete(fileMobile.value.id)
    }
    fileMobile.value = {}
}

const fileStore = useFilesStore()
const bannersStore = useBannersStore()
const { onCatchAxiosError } = useErrorsBackend()
const { showModal, record } = storeToRefs(bannersStore)
const titleModal = ref('')
const { errors, defineField, handleSubmit, setFieldError } = useForm({
    validationSchema: {
        title: string().required().max(250).label('Título'),
        sort: number().required().min(1).label('Ubicación'),
    }
})

const [title] = defineField('title')
const [sort] = defineField('sort')
const loading = ref(false)

const onOpen = async () => {
    if (record.value) {
        titleModal.value = 'Editar banner'
        const response = await bannersStore.onShow(record.value.id)
        onSetDefaultData(response.data.data)
    } else {
        titleModal.value = 'Crear banner'
        onSetDefaultData()
    }
}

const onSetDefaultData = (data = null) => {
    title.value = data ? data.title : ''
    sort.value = data ? data.sort : 1
    file.value = data ? data.image_computer : {}
    fileMobile.value = data ? data.image_cellular : {}
}

const onSubmit = handleSubmit(async (values) => {
    loading.value = true
    try {
        const data = new FormData()
        data.append('title', values.title || '')
        data.append('sort', values.sort || 1)
        if (file.value.raw) {
            data.append('image_computer', file.value.raw)
        }
        if (fileMobile.value.raw) {
            data.append('image_cellular', fileMobile.value.raw)
        }

        const response = record.value ? await bannersStore.onUpdate(record.value.id, data) : await bannersStore.onStore(data)
        ElNotification({
            title: successAxiosTitle,
            message: response.data.message,
            type: 'success',
        })
        showModal.value = false
        await bannersStore.onGetRecords()
    } catch (err) {
        onCatchAxiosError(err, setFieldError)
    } finally {
        loading.value = false
    }
})
</script>