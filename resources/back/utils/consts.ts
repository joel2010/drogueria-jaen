export const errorsAxiosCode = [500, 401, 403]

export const errorAxiosTitle = 'Ups...'

export const successAxiosTitle = 'Excelente...'

export const toPrice = (value: Number): string =>
  value.toLocaleString('en-En', {
    maximumFractionDigits: 2,
    minimumFractionDigits: 2
  })

export const formatDatePicker = 'DD/MM/YYYY'

export const formatDateTimePicker = 'DD/MM/YYYY HH:mm:ss'

export const valueFormatDatePicker = 'YYYY-MM-DD'

export const valueFormatDateTimePicker = 'YYYY-MM-DD HH:mm:ss'

export const formatDateTime = 'yyyy-MM-dd HH:mm:ss'

export const formatDate = 'yyyy-MM-dd'
