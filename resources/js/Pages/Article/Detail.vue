<script setup>

import {computed, ref} from "vue";
import Formular from "@/Components/Formular.vue";
import Confirm from "@/Components/Confirm.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({article: Object})
const form = useForm({});

const isModifying = ref(false)
const isConfirmOpen = ref(false)
function toggleFormular()
{
    isModifying.value = !isModifying.value
}
function toggleVisibility()
{
    isConfirmOpen.value = !isConfirmOpen.value
}
function update(form)
{
    form.post(`/update/${props.article.id}`)
}
function remove()
{
    form.delete(`/delete/${props.article.id}`)
}
const imageUrl = computed(()=>{
    if(props.article && props.article.imageUrl.includes("http"))
    {
        return props.article.imageUrl
    }
    return `/storage/${props.article.imageUrl}`
})
</script>

<template>
    <header class="flex box-border relative justify-end items-start h-10 bg-gray-400">
        <div class="flex relative box-border bg-gray-400 flex-col w-32 h-10 overflow-hidden hover:h-auto">
            <div class="flex box-border w-full min-h-10 justify-center items-center font-extrabold text-gray-100 hover:bg-gray-300">
                Menu
            </div>
            <div class="flex flex-col w-full">
                <button @click="toggleFormular"
                        class="h-10 hover:bg-gray-300"
                >
                    {{ isModifying?"cancel" : "modify"}}
                </button>
                <button v-if="!isConfirmOpen && !isModifying" @click="toggleVisibility"
                        class=" h-10 hover:bg-gray-300"
                >
                    delete
                </button>
            </div>

        </div>
    </header>
    <Formular v-if="isModifying" :article="props?.article" :submitHandler="update"/>
    <main class="max-w-5xl mx-auto p-2" v-else>
        <h1 class="font-extrabold text-4xl text-center my-5 text-gray-700">{{ props?.article?.title }}</h1>

        <img class="mx-auto w-[640px] h-[480px] object-cover" :src="imageUrl" alt="image"/>
        <article class="grid grid-rows-5 relative w-full min-h-64 border-2 my-5 p-2 ">
            <div class="absolute min-w-16 top-[-15px] left-[10px] h-[30px] border px-3 bg-blue-950 text-cyan-50 rounded-3xl">{{ props?.article?.categorie }}</div>
            <p class="row-span-4 p-2 bg-gray-100 text-gray-800 text-xl">{{ props?.article?.content }}</p>
            <p class="flex justify-end items-end">created: {{ props?.article?.created_at }} / updated: {{ props?.article?.updated_at }}</p>
        </article>
    </main>
    <Confirm
        action-type="supprimer"
        @confirm.once="remove"
        @cancel="toggleVisibility"
        :visible="isConfirmOpen"
        class="absolute flex flex-col justify-center items-center top-0 bg-opacity-90 size-full bg-black"
    />
</template>
