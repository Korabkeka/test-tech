<script setup>
//import Layout from './Layout'
import ArticlePreview from '../../Components/ArticlePreview.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps({ articles: Object })
</script>

<template>
  <!--<Layout>-->
    <!--<Head title="Welcome" />-->
    <h1>Welcome</h1>
    <Link href="/new">Nouvel article</Link>
    <ul>
        <ArticlePreview v-for="article in props.articles" :key="article.id" :article="article"/>
    </ul>
    <p>Hello , welcome to your first Inertia app!</p>
  <!--</Layout>-->
</template>
<style>
</style>
