<script setup>
import ArticlePreview from '../../Components/ArticlePreview.vue';
import { Link, router } from '@inertiajs/vue3'
import {ref} from "vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps(["articles", "per_page", "current_page", "order_by", "filter"])
const itemsPerPage = ref(props.per_page)
const currentPage = ref(props.current_page)
const orderBy = ref(props.order_by)
const filter = ref(props.filter)
function onOptionChange()
{
    router.post(`http://127.0.0.1:8000/?page=${currentPage.value}&count=${itemsPerPage.value}&order=${orderBy.value?orderBy.value:null}&filter=${filter.value?filter.value:"all"}`)
}
function onNavigate(url)
{
    router.post(`${url}&count=${itemsPerPage.value}&order=${orderBy.value?orderBy.value:null}&filter=${filter.value?filter.value:"all"}`)
}
</script>

<template>
    <header class="flex mx-auto w-full h-20 items-center justify-center">
        <h1 class="text-2xl">Test technique: Basic Blog</h1>
    </header>
    <Link
        href="/new"
        class="flex w-[120px] block h-[50px] bg-blue-950 items-center justify-center border-2 rounded mx-auto text-amber-50 font-bold"
    >
        Nouvel article
    </Link>
    <div class="flex w-full mx-auto gap-4 border max-w-5xl my-4 p-5">
        <div class="flex grow">
            <label>Articles par pages: </label>
            <select @change="onOptionChange" v-model="itemsPerPage" class="grow">
                <option value="5">5</option>
                <option value="15">15</option>
                <option value="30">30</option>
            </select>
        </div>
        <div class="flex grow">
            <label>Filtrer par categorie: </label>
            <select @change="onOptionChange" v-model="filter" class="grow">
                <option value="all">Tout voir</option>
                <option value="food">food</option>
                <option value="sport">sport</option>
                <option value="tech">technologie</option>
            </select>
        </div>
        <div class="flex grow">
            <label>Filtrer par date: </label>
            <select @change="onOptionChange" v-model="orderBy" class="grow">
                <option value="asc">croissant</option>
                <option value="desc">décroissant</option>
            </select>
        </div>
    </div>
    <ul class="grid relative grid-cols-1 gap-4 size-full p-5 mt-[20px] ">
        <ArticlePreview
            v-for="article in props.articles.data"
            :key="article.id"
            :article="article"
            class="box-border relative max-w-5xl w-full mx-auto border-2 p-1 grid grid-rows-3 hover:before:content-['En_savoir_plus_--->'] hover:before:absolute hover:before:size-full hover:before:flex hover:before:justify-center hover:before:items-center hover:before:bg-gray-500 hover:before:bg-opacity-75 hover:before:text-cyan-50 hover:before:text-2xl"
        />
    </ul>
    <Pagination :links="articles.links" :current-page="current_page" @navigate="onNavigate"/>
</template>

