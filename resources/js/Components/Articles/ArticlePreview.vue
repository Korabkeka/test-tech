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
        <h2
            class="row-span-2 bg-blue-50 p-2"
        >
            {{ props?.article?.title }}
        </h2>
        <div class="flex justify-end">{{ props?.article?.updated_at }}</div>
    </Link>
</template>
