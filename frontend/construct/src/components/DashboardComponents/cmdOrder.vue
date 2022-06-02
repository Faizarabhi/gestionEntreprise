<template>

    <tr v-for="index in 4" :key="index">
        <th>1</th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Littel, Schaden and Vandervort</td>
        <td>Canada</td>
        <td>12/16/2020</td>
        <td>
           <a class="inline-flex items-center justify-center "> <lottie-animation @mouseover="start('edit', index)" @mouseleave="stop('edit', index)" ref="edit" :speed="1"
                :autoPlay="false" path="lottie/edit.json" /></a>
        </td>
        <td><a class="inline-flex items-center justify-center ">
                                    <lottie-animation @mouseover="start('trash', index)" @mouseout="stop('trash', index)"
                                        ref="trash" :speed=".1" :autoPlay="false" path="lottie/trashV2.json" />
                                </a></td>
    </tr>


</template>
 <script>
import router from "@/router";
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
    components: {
        LottieAnimation
    },
    methods: {
      start(refName, index) {
            const el = index !== undefined ?  this.$refs[refName]?.[index] : this.$refs[refName];  
            el.anim.play();
        },
        stop(refName, index) {
            const el = index !== undefined ?  this.$refs[refName]?.[index] : this.$refs[refName];  
            el.anim.stop();
        },
}
}
</script>