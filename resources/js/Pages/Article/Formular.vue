<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    title: null,
    content: null,
    category: null,
    image: null
})

function submit() {
    console.log(form.data())
    form.post('/store')
}
</script>

<template>
    <form @submit.prevent="submit">
        <label for="title">Titre:</label>
        <input name="title" type="text" v-model="form.title" />
        <label for="category">Catégorie:</label>
        <select name="category" id="category" v-model="form.category">
            <option value="food">Food</option>
            <option value="sport">Sport</option>
            <option value="technology">Technologie</option>
        </select>
        <label for="content">Contenu: </label>
        <textarea name="content" id="content" v-model="form.content" cols="30" rows="10"></textarea>
        <label for="image">Image: </label>
        <input name="image" type="file" @input="form.image = $event.target.files[0]" />
        <button type="submit">Envoyer</button>
    </form>
</template>
