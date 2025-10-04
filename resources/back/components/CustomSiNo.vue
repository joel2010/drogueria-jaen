<template>
    <div class="si-no" :class="{ active: active }">
        <el-icon v-if="active" :size="12">
            <Check />
        </el-icon>
        <el-icon v-else :size="12">
            <CloseBold />
        </el-icon>
    </div>
</template>
<script setup>
import { Check, CloseBold } from '@element-plus/icons-vue';

defineProps({
    active: {
        type: Boolean,
        required: true
    }
})
</script>