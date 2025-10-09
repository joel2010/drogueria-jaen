import { defineStore } from 'pinia'
import http from '../utils/http'

export const useBrandsStore = defineStore('brands', {
    state: () => ({
        showModal: false,
        records: [],
        record: null
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/brands')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/brands/store', data)
        },
        async onUpdate (id, data) {
            return await http.put(`/brands/${id}/update`, data)
        },
        async onShow (id) {
            return await http.get(`/brands/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/brands/${id}/delete`)
        }
    }
})
