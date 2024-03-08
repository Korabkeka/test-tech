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

    <Link
        href="/new"
        class="flex w-[120px] block h-[50px] bg-blue-950 items-center justify-center border-2 rounded-2xl mx-auto text-amber-50 font-bold"
    >
        Nouvel article
    </Link>
    <ul class="grid relative grid-cols-1 gap-4 size-full p-5 mt-[20px] ">
        <ArticlePreview
            v-for="article in props.articles"
            :key="article.id"
            :article="article"
            class="box-border relative max-w-5xl w-full mx-auto border-2 p-1 grid grid-rows-3 hover:before:content-['En_savoir_plus_--->'] hover:before:absolute hover:before:size-full hover:before:flex hover:before:justify-center hover:before:items-center hover:before:bg-gray-500 hover:before:bg-opacity-75 hover:before:text-cyan-50 hover:before:text-2xl"
        />
    </ul>
</template>
<style>
</style>
