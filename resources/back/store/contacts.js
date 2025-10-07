import { defineStore } from 'pinia'
import http from '../utils/http'

export const useContactsStore = defineStore('contacts', {
    state: () => ({
        records: [],
        paginator: {
            per_page: 1,
            total: 1
        },
        filters: {
            page: 1
        }
    }),
    actions: {
        async onGetRecords () {
            const response = await http.get('/contacts', {
                params: this.filters
            })
            this.records = response.data.data
            this.paginator = response.data.meta
        }
    }
})
