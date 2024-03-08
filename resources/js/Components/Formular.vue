<script setup>
import { useForm } from '@inertiajs/vue3'
const props = defineProps({
    article: Object,
    submitHandler: Object
})
const form = useForm({
    title: props?.article?.title,
    content: props?.article?.content,
    category: props?.article?.category,
    image: null
})
function submit()
{
    if(props.submitHandler)props.submitHandler(form)
}
</script>

<template>
    <form @submit.prevent="submit" class="flex flex-col my-5 p-5 max-w-5xl mx-auto">
        <div class="flex">
            <label for="title" class="flex justify-start items-center w-20 h-full">Titre:</label>
            <input name="title" type="text" v-model="form.title" class="bg-gray-100 p-2 grow"/>
        </div>
        <div class="flex my-4">
            <label for="category" class="flex justify-start items-center w-20 h-full">Catégorie:</label>
            <select name="category" id="category" v-model="form.category" class="grow bg-gray-100">
                <option value="food">Food</option>
                <option value="sport">Sport</option>
                <option value="technology">Technologie</option>
            </select>
        </div>
        <div class="flex my-4">
            <label for="content" class="flex justify-start items-center w-20 h-full">Contenu: </label>
            <textarea name="content" id="content" v-model="form.content" cols="30" rows="10" class="grow bg-gray-100 resize-none"></textarea>
        </div>
        <div class="flex my-4">
            <label for="image" class="flex justify-start items-center w-20 h-full">Image: </label>
            <input name="image" type="file" @input="form.image = $event.target.files[0]" class="grow"/>
        </div>

        <button type="submit" class="bg-green-300 w-40 p-2 rounded mx-auto">Envoyer</button>
    </form>
</template>

<style scoped>

</style>
