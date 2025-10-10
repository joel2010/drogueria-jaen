<template>
    <div class="min-h-screen to-gray-800 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="bg-white rounded-[20px] w-full max-w-4xl overflow-hidden px-6 pb-10">
            <div class="pt-6 px-0 pb-4">
                <div v-if="currentStep === 1" class="flex flex-col mb-2 gap-4 justify-center items-center">
                    <img src="/public/images/logo.png" alt="Droguería Jaen Logo" class="w-[370px] mr-4 max-w-max mb-1">
                    <div class="text-center text-sm">
                        <p class="text-title2">RUC: 20554060651 - IMV VILLA</p>
                        <p class="text-title2">Los Olivos - Lima, Perú</p>
                    </div>
                </div>
                <div v-else-if="currentStep === 2"
                    class="flex items-center justify-between flex-wrap py-2 px-4 rounded mb-7">
                    <img src="/public/images/logo.png" alt="Droguería Jaen Logo"
                        class="w-[286px]  sm:w-[370px] mr-4 max-w-max mb-1">
                    <div class="text-right text-sm">
                        <p class="font-bold text-primary hidden sm:block">RUC: 20554060651 - IMv VILLA</p>
                        <p class="text-primary hidden sm:block">Droguería Jaen</p>
                        <p class="text-gray-500 hidden sm:block">Los Olivos - Lima, Perú</p>
                    </div>
                </div>
                <div v-if="currentStep === 1">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-1 sm:mt-4 text-center">
                        Libro de Reclamaciones
                    </h1>
                    <p class="text-gray-500 text-title mt-0 sm:mt-1 text-center">
                        Fecha: {{ currentDate }}
                    </p>
                </div>
                <div v-if="currentStep === 2" class="flex flex-col sm:flex-row items-center justify-between">
                    <h1 class="text-title text-left">
                        Libro de Reclamaciones
                    </h1>
                    <p class="text-title text-center">
                        Fecha: {{ currentDate }}
                    </p>
                </div>


                <p v-if="currentStep === 2" class="text-gray-600 text-sm mt-3 leading-relaxed">
                    En caso de ingresar el reclamo / queja, se omitirá la firma del consumidor. Por favor, sírvase
                    completar la siguiente información obligatoria:
                </p>
            </div>

            <form @submit.prevent="nextStep">
                <div v-if="currentStep === 1" class="space-y-6">
                    <div>
                        <label for="customer_type" class="block text-subtitle">TIPO DE CLIENTE</label>
                        <select id="customer_type" v-model="formData.customer_type"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md shadow-sm sm:max-w-[50%]">
                            <option value="" disabled>Seleccione</option>
                            <option v-for="option in clientTypes" :key="option.value" :value="option.value">{{
                                option.label }}</option>
                        </select>
                        <p class="text-description mt-1" v-if="formData.customer_type === 'cliente'">Cliente Drogueria
                            Jaen: Persona Natural o Jurídica que cuenta con un código de Cliente Drogueria Jaen y que
                            adquiere nuestros productos para comercializarlos y no para consumir.</p>
                        <p class="text-description mt-1" v-if="formData.customer_type === 'consumidor_final'">Consumidor
                            Final: Persona Natural o Jurídica que adquiere nuestros productos para su consumo personal.
                            No los comercializa.</p>
                    </div>

                    <div>
                        <label for="reclamationType" class="block text-subtitle">TIPO DE RECLAMACIÓN</label>
                        <select id="reclamationType" v-model="formData.reclamationType"
                            class="mt-1 block w-full pl-3 pr-10 py-2 border text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md shadow-sm sm:max-w-[50%]">
                            <option value="" disabled>Seleccione</option>
                            <option v-for="option in reclamationTypes" :key="option.value" :value="option.value">{{
                                option.label }}</option>
                        </select>
                        <p class="text-description mt-1" v-if="formData.reclamationType === 'queja'">
                            Queja: Disconformidad NO relacionada a los productos o servicios. Expresa el malestar o
                            descontento respecto a la atención recibida.</p>
                        <p class="text-description mt-1" v-if="formData.reclamationType === 'reclamo'">
                            Reclamo: Disconformidad relacionada a los productos o servicios prestados por Drogueria Jaen
                        </p>
                    </div>

                    <div>
                        <label for="document_number" class="block text-subtitle">DNI / CE / RUC</label>
                        <input type="text" id="document_number" v-model="formData.document_number"
                            placeholder="Ingrese su documento"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm sm:max-w-[50%]">
                    </div>
                    <div v-if="formData.customer_type === 'consumidor_final'">
                        <label for="invoice_number" class="block text-subtitle">N°Factura /
                            Boleta - Opcional</label>
                        <input type="text" id="invoice_number" v-model="formData.invoice_number"
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm sm:max-w-[50%]">
                    </div>
                    <div class="grid grid-cols-1 sm:flex  gap-3 justify-center mt-7">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Continuar
                        </button>
                        <button type="button" @click="resetForm()"
                            class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancelar
                        </button>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 text-sm text-gray-600 space-y-4 leading-relaxed">
                        <p>Se le informa que los datos personales que consigne en el presente formulario, serán tratados
                            conforme a nuestra Política de Privacidad de Quejas y Reclamos, con la finalidad de dar
                            respuesta a su comunicación dentro del plazo de la normativa.</p>
                        <p><strong class="font-semibold">RECLAMO:</strong> Disconformidad relacionada a los productos o
                            servicios prestados por Droguería Jaen</p>
                        <p><strong class="font-semibold">QUEJA:</strong> Disconformidad NO relacionada a los productos o
                            servicios. Expresa el malestar o descontento respecto a la atención recibida.</p>
                        <p>*La formulación del Reclamo o Queja no impide acudir a otras vías de solución de
                            controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</p>
                        <p>*El proveedor deberá dar respuesta al Reclamo o Queja en un plazo no mayor a quince (15) días
                            hábiles, improrrogables.</p>
                        <p><strong class="font-semibold">Importante:</strong> El correo desde el cual recibirá la
                            constancia de registro de su reclamo o queja, se utiliza exclusivamente para dicho fin.
                            <strong class="font-semibold">No está habilitado para recibir ni atender consultas
                                adicionales.</strong>
                        </p>
                    </div>
                </div>

                <div v-else-if="currentStep === 2" class="space-y-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 uppercase">Identificación del {{
                        formData.customer_type
                            == 'cliente' ? 'Cliente' : 'Proveedor' }} Reclamante
                    </h2>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center"
                            v-if="formData.customer_type == 'cliente'">
                            <label for="company_name"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Razón
                                social</label>
                            <input type="text" id="company_name" v-model="formData.company_name"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center" v-else>
                            <label for="first_name"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Nombre
                                completo</label>
                            <input type="text" id="first_name" v-model="formData.first_name"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center"
                            v-if="formData.customer_type == 'cliente'">
                            <label for="legal_representative"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Representante
                                Legal</label>
                            <input type="text" id="legal_representative" v-model="formData.legal_representative"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center" v-else>
                            <label for="last_name"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Apellido
                                completo</label>
                            <input type="text" id="last_name" v-model="formData.last_name"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="address"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Dirección</label>
                            <input type="text" id="address" v-model="formData.address"
                                placeholder="Ingresar su dirección"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="document_number"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">DNI / CE /
                                RUC</label>
                            <input type="text" id="document_number" v-model="formData.document_number"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="email"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Email</label>
                            <input type="email" id="email" v-model="formData.email"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="phone"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Teléfono</label>
                            <input type="tel" id="phone" v-model="formData.phone"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center"
                            v-if="formData.customer_type !== 'cliente'">
                            <label class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">¿Menor de
                                edad?</label>
                            <div class="w-full sm:w-2/3 flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input id="minor-yes" name="minorAge" type="radio" v-model="formData.minor"
                                        :value="true" class="focus:ring-primary h-4 w-4 text-primary border-gray-300">
                                    <label for="minor-yes" class="ml-2 block text-sm text-gray-700">Sí</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="minor-no" name="minorAge" type="radio" v-model="formData.minor"
                                        :value="false" class="focus:ring-primary h-4 w-4 text-primary border-gray-300">
                                    <label for="minor-no" class="ml-2 block text-sm text-gray-700">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-lg font-bold text-gray-800 mb-4 mt-6 uppercase">Identificación Bien Contratado</h2>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="good"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Bien</label>
                            <select id="good" v-model="formData.good"
                                class="w-full border sm:w-2/3 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md shadow-sm">
                                <option value="" disabled>Seleccione</option>
                                <option v-for="option in bienes" :key="option.value" :value="option.value">{{
                                    option.label }}</option>
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="invoice_number"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">N°Factura /
                                Boleta</label>
                            <input type="text" id="invoice_number" v-model="formData.invoice_number"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="claimed_amount"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Monto Reclamado
                                (S./)</label>
                            <input type="number" id="claimed_amount" v-model="formData.claimed_amount"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex flex-col sm:flex-row">
                            <label for="good_description"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Descripción</label>
                            <div class="relative w-full sm:w-2/3">
                                <textarea id="good_description" v-model="formData.good_description" rows="3"
                                    maxlength="150"
                                    class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 pr-10 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm resize-y"></textarea>
                                <span class="absolute bottom-2 right-2 text-xs text-gray-400">{{
                                    formData.good_description.length }} / 150</span>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-lg font-bold text-gray-800 mb-4 mt-6 uppercase">Detalle de la Reclamación y Pedido
                        del Cliente Droguería Jaen</h2>
                    <div class="grid grid-cols-1 gap-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="complaint_type"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Tipo</label>
                            <input type="text" id="complaint_type" v-model="formData.complaint_type"
                                placeholder="RECLAMO"
                                class="w-full sm:w-2/3 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-gray-50 cursor-not-allowed"
                                disabled>
                        </div>
                        <div class="flex flex-col sm:flex-row">
                            <label for="complaint_detail"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Detalle</label>
                            <div class="relative w-full sm:w-2/3">
                                <textarea id="complaint_detail" v-model="formData.complaint_detail" rows="4"
                                    maxlength="500"
                                    class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 pr-10 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm resize-y"></textarea>
                                <span class="absolute bottom-2 right-2 text-xs text-gray-400">{{
                                    formData.complaint_detail.length
                                    }} / 500</span>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row">
                            <label for="customer_request"
                                class="w-full sm:w-1/3 text-sm font-medium text-gray-700 mb-1 sm:mb-0">Pedido</label>
                            <div class="relative w-full sm:w-2/3">
                                <textarea id="customer_request" v-model="formData.customer_request" rows="4"
                                    maxlength="500"
                                    class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 pr-10 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm resize-y"></textarea>
                                <span class="absolute bottom-2 right-2 text-xs text-gray-400">{{
                                    formData.customer_request.length
                                    }} / 500</span>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-lg font-bold text-gray-800 mb-4 mt-6 uppercase">Opcional</h2>

                    <div class="mt-2 flex flex-col sm:flex-row">
                        <div class="w-full sm:w-1/3">
                            <label class="block text-subtitle mb-2">Adjuntar Archivo</label>
                            <p class="text-description mb-2 mr-5">(En caso de tener varios archivos, adjúntalos en un
                                .zip 0
                                .rar). Tamaño máximo permitido: 25 MB)</p>
                        </div>
                        <div class="flex flex-col items-start sm:items-center gap-3">
                            <input type="file" ref="fileInput" @change="handleFileUpload" class="hidden" multiple>
                            <button type="button" @click="$refs.fileInput.click()"
                                class="inline-flex items-center px-4 py-2 border gap-2 items-center border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <mask id="mask0_8406_149" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="0" width="25" height="25">
                                        <rect width="25" height="25" fill="url(#pattern0_8406_149)" />
                                    </mask>
                                    <g mask="url(#mask0_8406_149)">
                                        <rect x="-1.88184" y="-2.15039" width="26.8817" height="26.3441" fill="white" />
                                    </g>
                                    <defs>
                                        <pattern id="pattern0_8406_149" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_8406_149" transform="scale(0.00195312)" />
                                        </pattern>
                                        <image id="image0_8406_149" width="512" height="512" preserveAspectRatio="none"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAgAElEQVR4Ae3dC9B1VVkH8AcESQTvIuattNS0i+lMmcJkaWpeEI28pOlkXjAzIdG0Qa3MLLyh6aRN2piYpk3hjawMHctLoo5SMJhoWqIJ5TUVQalvI6987+acj3PZe69n7fVjxvk853vfvdf+rf9azzr7O+ucCP8RIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIECAAAECBAgQIFCzwKERcb+IOD4inhsRr4mId0TERyPiKxHxf/7XtMFd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xsjAvdssgW1ftb3/JpMxJhPHlCsZqCcDPvq37XWAqydAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBAgAABAgQIECBQVOD/AZVnH5EK23QcAAAAAElFTkSuQmCC" />
                                    </defs>
                                </svg>

                                Seleccionar archivo
                            </button>
                            <span v-if="formData.files.length > 0" class="mt-2 sm:mt-0 sm:ml-4 text-sm text-gray-600">
                                {{ formData.files.length }} archivo(s) seleccionado(s)
                            </span>
                            <span v-else class="mt-2 sm:mt-0 text-sm text-gray-600">
                                No se ha seleccionado archivo
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row">
                        <label for="supplier_observations" class=" w-full sm:w-1/3 block text-subtitle">Observaciones
                            y/o
                            acciones adoptadas por el proveedor </label>
                        <div class="relative w-full sm:w-2/3">
                            <textarea id="supplier_observations" v-model="formData.supplier_observations" rows="4"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm resize-y bg-gray-50"></textarea>
                            <p class="mt-2 text-description !text-black">Las acciones adoptadas para atender su reclamo
                                o queja
                                serán remitidas al correo electrónico registrado dentro del plazo legal</p>
                        </div>
                    </div>

                    <div
                        class="mt-8 pt-6 border-t border-gray-200 text-sm text-gray-600 space-y-4 leading-relaxed text-center">
                        <p>*La formulación del Reclamo o Queja no impide acudir a otras vías de solución de
                            controversias ni es requisito previo para interponer una denuncia ante el INDECOPLI.</p>
                        <p>*El proveedor deberá dar respuesta al Reclamo o Queja en un plazo no mayor a quince (15) días
                            hábiles, improrrogables.</p>
                        <p>Si necesita ayuda, escribe a nuestro correo: <a href="mailto:comercial@drogueriajaen.com.pe"
                                class="text-primary hover:underline">comercial@drogueriajaen.com.pe</a></p>
                    </div>

                    <div class="grid grid-cols-1 sm:flex justify-center mt-6 gap-2">
                        <button type="button" @click="prevStep"
                            class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Grabar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <ConfirmationModal :show="showConfirmationModal" :image-url="teamImageUrl"
            @close="showConfirmationModal = false" />
    </div>
</template>

<script setup>
import axios from 'axios';
import ConfirmationModal from './modal.vue';
import { ref, reactive, computed } from 'vue';

const currentStep = ref(1);
const showConfirmationModal = ref(false);
const formData = reactive({
    // Paso 1
    customer_type: '',
    first_name: '',
    last_name: '',
    reclamationType: '',
    // Paso 2
    company_name: '',
    legal_representative: '',
    address: '',
    document_number: '',
    email: '',
    phone: '',
    minor: false,
    good: '',
    invoice_number: '',
    claimed_amount: null,
    good_description: '',
    complaint_type: 'RECLAMO',
    complaint_detail: '',
    customer_request: '',
    files: [],
    supplier_observations: '',
});

const clientTypes = [
    { label: 'Cliente de Droguería Jaen', value: 'cliente' },
    { label: 'Consumidor final', value: 'consumidor_final' },
];

const reclamationTypes = [
    { label: 'Reclamo', value: 'reclamo' },
    { label: 'Queja', value: 'queja' },
];

const bienes = [
    { label: 'Producto', value: 'producto' },
    { label: 'Servicio', value: 'servicio' },
];

const currentDate = computed(() => {
    const date = new Date();
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
});

const nextStep = () => {
    if (currentStep.value === 1) {
        if (!formData.customer_type || !formData.reclamationType || !formData.document_number) {
            alert('Por favor, complete todos los campos obligatorios del Paso 1.');
            return;
        }
        currentStep.value = 2;
    } else if (currentStep.value === 2) {
        // Validaciones para el Paso 2
        if (!formData.company_name || !formData.address || !formData.email || formData.minor === null || !formData.good || !formData.complaint_detail || !formData.customer_request) {
            alert('Por favor, complete todos los campos obligatorios del Paso 2.');
            return;
        }
        submitForm();
    }
};

const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};

const cancelForm = () => {
    if (confirm('¿Estás seguro que deseas cancelar? Se perderán los datos ingresados.')) {
        Object.assign(formData, {
            customer_type: '',
            reclamationType: '',
            document_number: '',
            company_name: '',
            legal_representative: '',
            address: '',
            document_number: '',
            email: '',
            phone: '',
            minor: false,
            good: '',
            invoice_number: '',
            claimed_amount: null,
            good_description: '',
            complaint_type: 'RECLAMO',
            complaint_detail: '',
            customer_request: '',
            files: [],
            supplier_observations: '',
        });
        currentStep.value = 1;
        alert('Formulario cancelado y datos limpiados.');
    }
};

const resetForm = () => {
    Object.assign(formData, {
        customer_type: '',
        reclamationType: '',
        document_number: '',
        company_name: '',
        legal_representative: '',
        address: '',
        document_number: '',
        email: '',
        phone: '',
        minor: false,
        good: '',
        invoice_number: '',
        claimed_amount: null,
        good_description: '',
        complaint_type: 'RECLAMO',
        complaint_detail: '',
        customer_request: '',
        files: [],
        supplier_observations: '',
    });
    currentStep.value = 1;
};
const handleFileUpload = (event) => {
    formData.files = Array.from(event.target.files);
    console.log('Archivos seleccionados:', formData.files);
};



const submitForm = async () => {
    try {
        const formToSend = new FormData()
        console.log('Preparando datos para enviar:', formData);

        for (const key in formData) {
            const value = formData[key];

            if (key === 'files' && Array.isArray(value)) {
                value.forEach((file) => formToSend.append('files[]', file));
            } else if (value === null || value === undefined) {
                formToSend.append(key, '');
            } else if (typeof value === 'boolean') {
                formToSend.append(key, value ? '1' : '0');
            } else {
                formToSend.append(key, value);
            }
        }

        console.log('Contenido de FormData:', Array.from(formToSend.entries()));


        // Llamada a la API con la instancia configurada
        const response = await axios.post('/complaints-book', formToSend, {
            headers: { 'Content-Type': 'multipart/form-data' }
        })
        showConfirmationModal.value = true;

        alert('Reclamo enviado correctamente ✅')
        console.log('Respuesta del servidor:', response.data)
        resetForm()
    } catch (error) {
        console.error('Error al enviar el formulario:', error)
        alert('Ocurrió un error al enviar el reclamo. Intente nuevamente.')
    }
}
</script>

<style scoped>
/* No se necesitan estilos scoped adicionales si Tailwind está configurado correctamente */
</style>
