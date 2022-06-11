<template>
    <div class="flex flex-col">
        <card />
        <Line/>
        <div class="flex">
            <Dounat />
            <LinearScale />
        </div>
    </div>
</template>
<script>
import LinearScale from "./LinearScale.vue"
import card from './card.vue'
import Dounat from './Dounat.vue'
import Line from './Line.vue'
export default {
    components: {
        LinearScale,
        card,
        Dounat,
        Line
    },
}


</script>