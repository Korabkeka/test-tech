<script setup>

import {computed} from "vue";

const props = defineProps({article: Object})
const imgUrl = computed(()=>{
    return "/storage/" + props?.article?.imageUrl
})
</script>

<template>
    <h1>{{ props?.article?.title }}</h1>
    <h2>{{ props?.article?.categorie }}</h2>
    <img :src="imgUrl" alt="image"/>
    <p>{{ props?.article?.content }}</p>
    <p>created: {{ props?.article?.created_at }} / updated: {{ props?.article?.updated_at }}</p>
</template>
