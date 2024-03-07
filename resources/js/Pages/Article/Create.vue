<script setup>
import Formular from "@/Components/Formular.vue";

function submit(form) {
    form.post('/store')
}
</script>

<template>
    <Formular :submitHandler="submit"/>
</template>
