<template>
    <div class="relative w-full h-[300px] md:h-[400px] flex items-center justify-center text-white md:mt-[-25px]"
        :style="{ backgroundImage: 'url(' + image + ')' }">
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <div class="relative z-10 p-4 text-center max-w-[700px]">
            <h1 class="text-lg md:text-5xl font-bold leading-tight">
                {{ title }}
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>
div {
    background-size: cover;
    background-position: center;
}
</style>
