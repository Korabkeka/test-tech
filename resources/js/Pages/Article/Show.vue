<script setup>
//import Layout from './Layout'
import { Head } from '@inertiajs/vue3'

const props = defineProps({ articles: Object })
console.log(props.articles)
</script>

<template>
  <!--<Layout>-->
    <!--<Head title="Welcome" />-->
    <h1>Welcome</h1>
    <ul>
        <li v-for="article in articles">{{ article.title }}</li>
    </ul>
    <p>Hello , welcome to your first Inertia app!</p>
  <!--</Layout>-->
</template>
<style>
</style>
