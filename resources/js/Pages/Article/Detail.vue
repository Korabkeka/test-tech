<script setup>

import {computed, ref} from "vue";
import Formular from "@/Components/Articles/Formular.vue";
import Confirm from "@/Components/Articles/Confirm.vue";
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
    <main>
        <ul>
            <li>...</li>
            <li @click="toggleFormular">{{ isModifying?"cancel" : "modify"}}</li>
            <li v-if="!isConfirmOpen" @click="toggleVisibility">delete</li>
        </ul>
    </main>
    <Formular v-if="isModifying" :article="props?.article" :submitHandler="update"/>
    <div v-else>
        <h1>{{ props?.article?.title }}</h1>
        <h2>{{ props?.article?.categorie }}</h2>
        <img :src="imageUrl" alt="image"/>
        <p>{{ props?.article?.content }}</p>
        <p>created: {{ props?.article?.created_at }} / updated: {{ props?.article?.updated_at }}</p>
    </div>
    <Confirm action-type="supprimer" @confirm.once="remove" @cancel="toggleVisibility" :visible="isConfirmOpen"/>
</template>
