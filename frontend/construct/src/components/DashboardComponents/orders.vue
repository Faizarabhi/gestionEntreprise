  <template>
  <div class="w-full">
    <div
      class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
      <div class="py-8">
        <a href="#addcmd" class="inline-flex items-center justify-center ">
          <lottie-animation @click="start" ref="anim" :speed=".2" :autoPlay="false" path="lottie/plusToX.json" />

        </a>
      </div>
      <div class="overflow-x-auto">
        <table class="table table-compact w-full " >
          <thead>
            <!-- <tr>


              <th>Ref : {{ order[0]?.id }}</th>
              <th>Customer : {{ this.order[0] }}</th>
              <th>Date Creation : {{ this.order[0] }}</th>


              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th @click="showcmd.value[index] = !showcmd.value[index]">take it</th>
            </tr> -->
            <tr v-for="order in orders" :key="order.id">
              <th>Ref: {{ order.id }}</th>
              <th>Customer : {{ order.customer_id }}</th>
              <th>Date Creation : {{ order.date_creation }}</th>
              <th @click="showcmd.value[index] = !showcmd.value[index]">take it</th>
            </tr>
          </thead>
          <tbody>
            <command v-if="showcmd.value[index]" />
          </tbody>
          <tfoot>
            <tr>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>



  </div>
</template>
  <script>
import axios from 'axios';
import command from '../DashboardComponents/cmdOrder.vue'
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
  components: {
    LottieAnimation,
    command
  },
  inject: ["showcmd"],

  provide() {
    return {

    }
  },

  data() {
    return {
      orders: [],

    };
  },
  mounted() {
    this.getAllfacture();
  },
  methods: {
    // async getAllfactur() {
    //   // http://localhost/filrouge/backend/public/FactureController/getAllfacture
    //    let respons = await fetch(
    //             "http://localhost/filrouge/backend/public/FactureController/getAllfacture"
    //         );
    //         let res= await respons.json();
    //         console.log(res[0].id )
    // },
    getAllfacture() {
      // console.log("hello");
      axios.get('http://localhost/filrouge/backend/public/FactureController/getAllfacture')
        .then(res => {

          this.orders = res.data
          console.log(this.orders);

        })
    },
  },

};
</script>
