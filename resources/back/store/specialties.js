import { defineStore } from 'pinia'
import http from '../utils/http'

export const useSpecialtiesStore = defineStore('specialties', {
    state: () => ({
        showModal: false,
        records: [],
        record: null
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/specialties')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/specialties/store', data)
        },
        async onUpdate (id, data) {
            return await http.put(`/specialties/${id}/update`, data)
        },
        async onShow (id) {
            return await http.get(`/specialties/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/specialties/${id}/delete`)
        }
    }
})
