<template>
    <div class="  w-full px-4 mt-4">
        <div class="lg:grid flex flex-col">
        <card />
        <div class="lg:grid  md:grid-flow-col lg:gap-4 flex flex-col">
            <Line />
            
                <div class="lg:row-span-3">
                    <!-- <Dounat /> -->
                </div>
                <div class="lg:row-span-2">
                    <!-- <LinearScale /> -->
                
            </div>
        </div>
    </div></div>
</template>
<script>
import card from './card.vue'
import Line from './Line.vue'
import LinearScale from "./LinearScale.vue"
import Dounat from './Dounat.vue'
export default {
    components: {
        card,
        LinearScale,
        Dounat,
        Line
    },
}



</script>