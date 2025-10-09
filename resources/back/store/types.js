import { defineStore } from 'pinia'
import http from '../utils/http'

export const useTypesStore = defineStore('types', {
    state: () => ({
        showModal: false,
        records: [],
        record: null
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/types')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/types/store', data)
        },
        async onUpdate (id, data) {
            return await http.put(`/types/${id}/update`, data)
        },
        async onShow (id) {
            return await http.get(`/types/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/types/${id}/delete`)
        }
    }
})
