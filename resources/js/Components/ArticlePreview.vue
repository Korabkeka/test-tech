<script setup>
    import { Link } from '@inertiajs/vue3'
    import { computed} from 'vue'
    const props = defineProps({article : Object})
    const url = computed(()=>{
        return `/articles/${props.article.id}`
    })
</script>

<template>
    <Link :href="url">
        <h2>{{ props?.article?.title }}</h2>
        <div>{{ props?.article?.updated_at }}</div>
    </Link>


</template>
