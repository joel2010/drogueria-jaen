import { defineStore } from 'pinia'
import http from '../utils/http'

export const useBannersStore = defineStore('banners', {
    state: () => ({
        showModal: false,
        records: [],
        record: null
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/banners')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/banners/store', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
        },
        async onUpdate (id, data) {
            return await http.post(`/banners/${id}/update`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
        },
        async onShow (id) {
            return await http.get(`/banners/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/banners/${id}/delete`)
        }
    }
})
