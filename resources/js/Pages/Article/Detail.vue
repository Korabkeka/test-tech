<script setup>

const props = defineProps({article: Object})
</script>

<template>
    <h1>{{ props?.article?.title }}</h1>
    <img :src="props?.article?.imageUrl" alt="image"/>
    <p>{{ props?.article?.content }}</p>
    <p>created: {{ props?.article?.created_at }} / updated: {{ props?.article?.updated_at }}</p>
</template>
