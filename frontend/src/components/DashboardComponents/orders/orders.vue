  <template>
  <div class="relative w-full p-16 rounded-lg ">
     
      <div >
        <table class="table table-compact  " v-for="(facture, index) in factures" :key="facture.id">
          <thead >

            <tr >
              <th>Ref- {{ facture.id }}</th>
              <th>Customer- {{ facture.customer_id }}</th>
              <th>Date Creation : {{ facture.date_creation }}</th>
              <th @click="currentFacture = currentFacture === facture.id ? undefined : facture.id">
                <span class="inline-flex items-center justify-center  ">
                  <lottie-animation @mouseover="start('arrow', index)" @mouseout="stop('arrow', index)" ref="arrow"
                    :speed="2" :autoPlay="false" path="lottie/arrowDownCircle.json" />
                </span>
              </th>
              <th></th>
              
            </tr>
          </thead>


          <tbody>
            <command v-if="currentFacture === facture.id" :orders="orders" />
          </tbody>

        </table>
      </div>
    </div>
  
</template>
  <script>
import axios from 'axios';
import command from './cmdOrder.vue'
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
      currentFacture: undefined,
      orders: [],


    };
  },
  mounted() {
    this.getAllfacture();

  },
  watch: {
    currentFacture(newValue, oldValue) {
      if (newValue === oldValue) return;
      if (!newValue) {
        this.orders = []
      } else {
        axios.get(`http://localhost/filrouge/backend/commandController/getCommandsByFacture/${this.currentFacture}`).then(res => {
          this.orders = res.data;
        })
      }
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
    getAllfacture() {
      // console.log("hello");
      axios.get('http://localhost/filrouge/backend/public/FactureController/getAllfacture')
        .then(res => {

          this.factures = res.data
          this.factures.forEach(_ => this.showcmd.value.push(false))

        })
    },

  },

  // http://localhost/filrouge/backend/public/FactureController/getAllCommande

};
</script>
