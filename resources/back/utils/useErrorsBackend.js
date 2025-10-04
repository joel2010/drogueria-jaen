import axios from "axios"
import { ElNotification } from "element-plus"
import { errorAxiosTitle, errorsAxiosCode } from "./consts"

export function useErrorsBackend() {
    const onCatchAxiosError = (err, setFieldError) => {
        if (axios.isAxiosError(err)) {
            const status = err.response?.status

            if (status === 422 && setFieldError) {
                const data = err.response?.data

                for (const [field, value] of Object.entries(data.errors)) {
                    const messages = value
                    if (messages && messages.length > 0) {
                        setFieldError(field, messages[0])
                    }
                }
            }
            if (errorsAxiosCode.includes(status || 500)) {
                ElNotification({
                    title: errorAxiosTitle,
                    message: err.response?.data.message || 'Ocurrió un error al procesar su información',
                    type: 'error',
                })
            }
            if (status === 401) {
                window.location.href = '/login'
            }
        }
    }

    return { onCatchAxiosError }
}