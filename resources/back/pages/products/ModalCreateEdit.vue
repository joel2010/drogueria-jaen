<template>
    <form @submit.prevent="onSubmit">
        <el-dialog v-model="showModal" :title="title" width="1000" @open="onOpen" :close-on-click-modal="false">
            <el-row :gutter="15">
                <el-col :span="24" :md="8" class="form-group">
                    <label for="internal_id">Código interno</label>
                    <el-input v-model="internal_id" id="internal_id"></el-input>
                    <span v-if="errors.internal_id" class="error">{{ errors.internal_id }}</span>
                </el-col>
                <el-col :span="24" :md="16" class="form-group">
                    <label for="name">Nombre del producto</label>
                    <el-input v-model="name" id="name"></el-input>
                    <span v-if="errors.name" class="error">{{ errors.name }}</span>
                </el-col>
                <el-col :span="24" class="form-group">
                    <label for="subtitle">Descripción corta</label>
                    <el-input v-model="subtitle" id="subtitle"></el-input>
                    <span v-if="errors.subtitle" class="error">{{ errors.subtitle }}</span>
                </el-col>
                <el-col :span="24" class="form-group">
                    <label for="description">Descripción</label>
                    <QuillEditor v-model:content="description" :modules="modules" theme="snow" contentType="html" />
                    <span v-if="errors.description" class="error">{{ errors.description }}</span>
                </el-col>
                <el-col>
                    <br><br><br></br>
                </el-col>
                <el-col :span="24" :md="8" class="form-group">
                    <label for="presentation">Presentación</label>
                    <el-input v-model="presentation" id="presentation"></el-input>
                    <span v-if="errors.presentation" class="error">{{ errors.presentation }}</span>
                </el-col>
                <el-col :span="24" :md="16" class="form-group">
                    <label for="phone">Whatsapp</label>
                    <el-input v-model="phone" id="phone"></el-input>
                    <span v-if="errors.phone" class="error">{{ errors.phone }}</span>
                </el-col>
                <el-col :span="24" :md="6" class="form-group">
                    <label for="brand_id">Marca</label>
                    <el-select v-model="brand_id" id="brand_id" filteable>
                        <el-option v-for="(item, index) in tables.brands" :key="index" :value="item.id"
                            :label="item.name"></el-option>
                    </el-select>
                    <span v-if="errors.brand_id" class="error">{{ errors.brand_id }}</span>
                </el-col>
                <el-col :span="24" :md="6" class="form-group">
                    <label for="specialty_id">Especialidad</label>
                    <el-select v-model="specialty_id" id="specialty_id" filteable>
                        <el-option v-for="(item, index) in tables.specialties" :key="index" :value="item.id"
                            :label="item.name"></el-option>
                    </el-select>
                    <span v-if="errors.specialty_id" class="error">{{ errors.specialty_id }}</span>
                </el-col>
                <el-col :span="24" :md="6" class="form-group">
                    <label for="type_id">Tipo</label>
                    <el-select v-model="type_id" id="type_id" filteable>
                        <el-option v-for="(item, index) in tables.types" :key="index" :value="item.id"
                            :label="item.name"></el-option>
                    </el-select>
                    <span v-if="errors.type_id" class="error">{{ errors.type_id }}</span>
                </el-col>
                <el-col :span="24" :md="6" class="form-group">
                    <label for="category_id">Categoría</label>
                    <el-select v-model="category_id" id="category_id" filteable>
                        <el-option v-for="(item, index) in tables.categories" :key="index" :value="item.id"
                            :label="item.name"></el-option>
                    </el-select>
                    <span v-if="errors.category_id" class="error">{{ errors.category_id }}</span>
                </el-col>
                <el-col :span="24" :md="6" class="form-group">
                    <label for="sort">Ubicación</label>
                    <el-input v-model="sort" id="sort" type="number"></el-input>
                    <span v-if="errors.sort" class="error">{{ errors.sort }}</span>
                </el-col>
                <el-col :span="24" :md="12" class="form-group">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <label for="pdf">Ficha técnica</label>
                        <a v-if="pdfPath" class="text-primary ms-auto mr-3" :href="pdfPath" target="_blank">Ver pdf</a>
                        <a v-if="pdfPath" class="text-danger" href="#" @click.prevent="onDeletePdf">Eliminar pdf</a>
                    </div>
                    <div class="el-input">
                        <div class="el-input__wrapper">
                            <input id="pdf" class="el-input__inner" type="file" @change="onChangePdf" />
                        </div>
                    </div>
                </el-col>
            </el-row>
            <div class="form-group">
                <label>Imágenes</label>
                <ul class="files">
                    <li v-for="(item, index) in files" :key="index">
                        <img :src="item.file_path" :alt="`Imagen ${index}`">
                        <div class="files__btns">
                            <el-button type="danger" circle @click="onDeleteImage(item, index)">
                                <el-icon>
                                    <Delete />
                                </el-icon>
                            </el-button>
                        </div>
                    </li>
                </ul>
                <el-upload drag :auto-upload="false" action="#" multiple :on-change="onChangeFiles"
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
            <div class="form-group flex items-center justify-between">
                <label for="show_in_home">Mostrar en la página principal</label>
                <el-switch v-model="show_in_home" id="show_in_home"></el-switch>
            </div>
            <div class="form-group flex items-center justify-between">
                <label for="active">Mostrar producto</label>
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
import { onMounted, ref } from 'vue';
import { useForm } from 'vee-validate';
import { bool, number, string } from 'yup';
import { successAxiosTitle } from '../../utils/consts';
import { useErrorsBackend } from '../../utils/useErrorsBackend';
import { ElNotification } from 'element-plus';
import { useProductsStore } from '../../store/products';
import { useFilesStore } from '../../store/files';
import { QuillEditor } from '@vueup/vue-quill'
import ImageResize from 'quill-image-resize-vue';
import { Delete, UploadFilled } from '@element-plus/icons-vue';

const files = ref([])
const onChangeFiles = (file) => {
    const item = {
        id: null,
        raw: file.raw,
        file_path: URL.createObjectURL(file.raw)
    }
    files.value.push(item)
}
const onDeleteImage = async (img, index) => {
    if (img.id) {
        await fileStore.onDelete(img.id)
    }
    files.value.splice(index, 1)
}
const pdf = ref(null)
const pdfPath = ref('')
const fileStore = useFilesStore()
const productsStore = useProductsStore()
const { onCatchAxiosError } = useErrorsBackend()
const modules = {
    name: 'imageResizer',
    module: ImageResize,
    options: {}
}
const { showModal, record, tables } = storeToRefs(productsStore)
const title = ref('')
const { errors, defineField, handleSubmit, setFieldError } = useForm({
    validationSchema: {
        name: string().required().max(250).label('Nombre'),
        subtitle: string().required().max(250).label('Description corta'),
        description: string().required().label('Description'),
        internal_id: string().required().max(25).label('SKU'),
        presentation: string().required().max(50).label('Presentación'),
        phone: string().required().max(250).label('Mensaje por whatsapp'),
        category_id: number().required().label('Categoría'),
        brand_id: number().required().label('Marca'),
        type_id: number().required().label('Tipo'),
        specialty_id: number().required().label('Especialidad'),
        active: bool().required().label('Mostrar producto'),
        show_in_home: bool().required().label('Mostrar en la página principal'),
        sort: number().required().min(1).label('Ubicación'),
    }
})

const [name] = defineField('name')
const [subtitle] = defineField('subtitle')
const [description] = defineField('description')
const [internal_id] = defineField('internal_id')
const [presentation] = defineField('presentation')
const [phone] = defineField('phone')
const [category_id] = defineField('category_id')
const [brand_id] = defineField('brand_id')
const [type_id] = defineField('type_id')
const [specialty_id] = defineField('specialty_id')
const [show_in_home] = defineField('show_in_home')
const [active] = defineField('active')
const [sort] = defineField('sort')
const loading = ref(false)

const onChangePdf = (e) => {
    const files = e.target.files
    pdf.value = files[0]
}

const onDeletePdf = async () => {
    pdfPath.value = null
    pdf.value = null
    if (record.value.id) {
        const response = await productsStore.onDeletePdf(record.value.id)
        ElNotification({
            title: successAxiosTitle,
            message: response.data.message,
            type: 'success',
        })
    }
}

const onOpen = async () => {
    if (record.value) {
        title.value = 'Editar producto'
        const response = await productsStore.onShow(record.value.id)
        onSetDefaultData(response.data.data)
    } else {
        title.value = 'Crear producto'
        onSetDefaultData()
    }
}

const onSetDefaultData = (data = null) => {
    name.value = data ? data.name : ''
    subtitle.value = data ? data.subtitle : ''
    description.value = data ? data.description : ''
    phone.value = data ? data.phone : ''
    internal_id.value = data ? data.internal_id : ''
    presentation.value = data ? data.presentation : ''
    brand_id.value = data ? data.brand_id : ''
    specialty_id.value = data ? data.specialty_id : ''
    type_id.value = data ? data.type_id : ''
    category_id.value = data ? data.category_id : ''
    show_in_home.value = data ? data.show_in_home : false
    sort.value = data ? data.sort : 1
    active.value = data ? data.active : true
    files.value = data ? data.files : []
    pdfPath.value = data ? data.pdf : ''
}

const onSubmit = handleSubmit(async (values) => {
    loading.value = true
    try {
        const data = new FormData()
        data.append('name', values.name || '')
        data.append('subtitle', values.subtitle || '')
        data.append('description', values.description || '')
        data.append('internal_id', values.internal_id || '')
        data.append('presentation', values.presentation || '')
        data.append('phone', values.phone || '')
        data.append('category_id', values.category_id || '')
        data.append('brand_id', values.brand_id || '')
        data.append('type_id', values.type_id || '')
        data.append('specialty_id', values.specialty_id || '')
        data.append('sort', values.sort || 1)
        data.append('show_in_home', values.show_in_home ? 1 : 0)
        data.append('active', values.active ? 1 : 0)
        files.value.forEach((file) => {
            if (file.raw) {
                data.append('images[]', file.raw)
            }
        })
        if (pdf.value) {
            data.append('pdf', pdf.value)
        }

        const response = record.value ? await productsStore.onUpdate(record.value.id, data) : await productsStore.onStore(data)
        ElNotification({
            title: successAxiosTitle,
            message: response.data.message,
            type: 'success',
        })
        showModal.value = false
        await productsStore.onGetRecords()
    } catch (err) {
        onCatchAxiosError(err, setFieldError)
    } finally {
        loading.value = false
    }
})

onMounted(async () => {
    await productsStore.onGetTables()
})
</script>