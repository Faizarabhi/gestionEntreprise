<template>
    <div class="">
        <card />
        <LinearScale />
    </div>
</template>
<script>
import LinearScale from "./LinearScale.vue"
import card from './card.vue'
export default {
    components: {
        LinearScale,
        card,
    },
}


</script>