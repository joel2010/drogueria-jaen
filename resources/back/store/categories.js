import { defineStore } from 'pinia'
import http from '../utils/http'

export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        showModal: false,
        records: [],
        record: null
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/categories')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/categories/store', data)
        },
        async onUpdate (id, data) {
            return await http.put(`/categories/${id}/update`, data)
        },
        async onShow (id) {
            return await http.get(`/categories/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/categories/${id}/delete`)
        }
    }
})
