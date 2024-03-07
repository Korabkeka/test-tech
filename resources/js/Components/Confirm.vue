<script setup>
import {ref} from "vue";

const props = defineProps(["actionType", "visible"]);
</script>

<template>
    <div>
        <p class="text-3xl font-bold underline" v-if="props?.visible">On me voit</p>
        <p>Vous vous apprêtez à {{ props.actionType }}.</p>
        <p>voulez-vous confirmer?</p>
        <div>
            <button @click="$emit('confirm')">Confirmer</button>
            <button @click="$emit('cancel')">Annuler</button>
        </div>
    </div>
</template>

<style scoped>

</style>
