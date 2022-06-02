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
        <table class="table table-compact w-full ">
          <tbody>
            <tr v-for="(facture, index) in factures" :key="facture.id">
              <table>
                <thead>
                  
                  <td >Ref- {{ facture.id }}</td>
                  <td>Customer- {{ facture.customer_id }}</td>
                  <td>Date Creation : {{ facture.date_creation }}</td>
                  <td @click="showcmd.value[index] = !showcmd.value[index]">take it</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </thead>
                <tbody>
                  <command v-if="showcmd.value[index]" />
                </tbody>
              </table>
            </tr>
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
      idfacture: "",
      factures: [],
      

    };
  },
  mounted() {
    this.getAllfacture();
    
  },
  methods: {
    
    getAllfacture() {
      // console.log("hello");
      axios.get('http://localhost/filrouge/backend/public/FactureController/getAllfacture')
        .then(res => {

          this.factures = res.data
          this.factures.forEach( _ => this.showcmd.value.push(false))

        })
    },
    
  },
  
  // http://localhost/filrouge/backend/public/FactureController/getAllCommande

};
</script>
