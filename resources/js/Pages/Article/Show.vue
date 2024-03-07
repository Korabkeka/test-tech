<script setup>
//import Layout from './Layout'
import ArticlePreview from '../../Components/ArticlePreview.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps({ articles: Object })
</script>

<template>
    <header class="container flex mx-auto w-full h-20 items-center justify-center">
        <h1 class="text-2xl">Test technique: Basic Blog</h1>
    </header>

    <Link href="/new">Nouvel article</Link>
    <ul>
        <ArticlePreview v-for="article in props.articles" :key="article.id" :article="article"/>
    </ul>
</template>
<style>
</style>
