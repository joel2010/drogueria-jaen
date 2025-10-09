import { defineStore } from 'pinia'
import http from '../utils/http'

export const useProductsStore = defineStore('products', {
    state: () => ({
        showModal: false,
        records: [],
        record: null,
        tables: {}
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/products')
            this.records = response.data.data
        },
        async onStore (data) {
            return await http.post('/products/store', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
        },
        async onUpdate (id, data) {
            return await http.post(`/products/${id}/update`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
        },
        async onShow (id) {
            return await http.get(`/products/${id}/show`)
        },
        async onDelete (id) {
            return await http.delete(`/products/${id}/delete`)
        },
        async onGetTables () {
            const response = await http.get('/products/tables')
            this.tables = response.data.data
        }
    }
})
