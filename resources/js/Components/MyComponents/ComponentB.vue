<script setup>
const props = defineProps({
    par1:{
        type: String,
        require: true
    }
});
</script>

<template>
    <h1>Hello, {{ par1 }} COMP B</h1>
</template>