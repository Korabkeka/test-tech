<script setup>

const props = defineProps(["actionType", "visible"]);
</script>

<template>
    <Transition>
        <div v-if="visible" class="flex flex-col transition-all delay-0 duration-300">
            <div class="bg-blue-400 p-4 rounded">
                <p>Vous vous apprêtez à {{ actionType }}.</p>
                <p>voulez-vous confirmer?</p>
            </div>

            <div>
                <button @click="$emit('confirm')"
                        class="bg-red-400 p-3 rounded"
                >
                    Confirmer
                </button>
                <button @click="$emit('cancel')"
                        class="bg-gray-300 p-3 m-2 rounded"
                >
                    Annuler
                </button>
            </div>
        </div>
    </Transition>

</template>

<style scoped>
.v-enter-to{
    right: 0;
}
.v-leave-from {
    left: 0;
}

.v-enter-from{
    right: -100%;
}
.v-leave-to {
    left: -100%;
}
</style>
