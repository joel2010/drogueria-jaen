import { defineStore } from "pinia";
import http from "../utils/http";

export const useFilesStore = defineStore('files', {
    actions: {
        async onDelete(id) {
            return await http.delete(`/files/${id}/delete`)
        }
    }
})