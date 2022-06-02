    <template>

    <tr v-for="index in 4" :key="index">
        <th ><a @click="getAllCommande">1</a> </th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Littel, Schaden and Vandervort</td>
        <td>Canada</td>
        <td>12/16/2020</td>
        <td>
            <a class="inline-flex items-center justify-center ">
                <lottie-animation @mouseover="start('edit', index)" @mouseleave="stop('edit', index)" ref="edit"
                    :speed="1" :autoPlay="false" path="lottie/edit.json" />
            </a>
        </td>
        <td><a class="inline-flex items-center justify-center ">
                <lottie-animation @mouseover="start('trash', index)" @mouseout="stop('trash', index)" ref="trash"
                    :speed=".1" :autoPlay="false" path="lottie/trashV2.json" />
            </a></td>
    </tr>


</template>
    <script>
    import axios from 'axios';
import router from "@/router";
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
    components: {
        LottieAnimation
    },
    data() {
        return {

            orders: [],
        }
    },
    
        methods: {

        start(refName, index) {
            const el = index !== undefined ? this.$refs[refName]?.[index] : this.$refs[refName];
            el.anim.play();
        },
        stop(refName, index) {
            const el = index !== undefined ? this.$refs[refName]?.[index] : this.$refs[refName];
            el.anim.stop();
        },
        
        getAllCommande(){
        // console.log("hello");
        axios.get('http://localhost/filrouge/backend/public/FactureController/getAllCommande')
                .then(res => {

                    this.orders = res.data
                    console.log(this.orders)
                    // this.factures.forEach(_ => this.showcmd.value.push(false))

                })
        },

    }
}
</script>