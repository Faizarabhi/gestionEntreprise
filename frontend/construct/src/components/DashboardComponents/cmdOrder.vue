        <template>

    <tr v-for="order in orders" :key="order.commande_id">
        <td>{{ order.designation }}</td>
        <td>{{ order.quantity }}</td>
        <td>prix {{ order.prix_unitaire }}</td>
        <td>

            <span class="inline-flex items-center justify-center  ">
                <lottie-animation @mouseover="start('edit', index)" @mouseout="stop('edit', index)" ref="edit"
                    :speed="2" :autoPlay="false" path="lottie/edit.json" />
            </span>
        </td>
        <td>
            <span class="inline-flex items-center justify-center  ">
                <lottie-animation @mouseover="start('trash', index)" @mouseout="stop('trash', index)" ref="trash"
                    :speed="2" :autoPlay="false" path="lottie/trashV2.json" />
            </span>

        </td>
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
    props: ["orders"],
    data() {
        return {

            // orders: [],
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

        // getAllCommande() {
        //     // console.log("hello");
        //     axios.get('http://localhost/filrouge/backend/public/FactureController/getAllCommande')
        //         .then(res => {

        //             this.orders = res.data
        //             console.log(this.orders)
        //             // this.factures.forEach(_ => this.showcmd.value.push(false))

        //         })
        // },

    }
}
</script>