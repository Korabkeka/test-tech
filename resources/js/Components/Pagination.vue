<script setup>
const props = defineProps(['links','currentPage'])
</script>

<template>

    <div class="flex w-80 mx-auto">
        <button
            :disabled="links?.prev === null"
            @click="$emit('navigate', links?.prev)"
            class="w-1/3 bg-blue-950 p-2 rounded text-amber-50 font-extrabold"
            :class="{'bg-gray-400': links?.prev === null}"
        >
            Précédent
        </button>
        <div class="flex w-1/3 text-gray-800 font-extrabold text-3xl justify-center items-center">{{currentPage}}</div>
        <button
            :disabled="links?.next===null"
            @click="$emit('navigate', links?.next)"
            class="w-1/3 bg-blue-950 p-2 rounded text-amber-50 font-extrabold"
            :class="{'bg-gray-400': links?.next === null}"
        >
            Suivant
        </button>
    </div>
</template>

<style scoped>

</style>
