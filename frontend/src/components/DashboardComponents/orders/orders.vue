<template>
  <div class=" w-full p-16 rounded-lg ">

    <div class="overflow-x-auto p-8">
        
      <table class="table table-compact  w-full  " v-for="(facture, index) in factures" :key="facture.id">
        <thead>

        <tr>
          <th class=" w-[10%]">Ref- {{ facture.id }}</th>
          <th class="w-2/5">Customer {{ facture.name }}</th>
          <th class="w-2/5">Date Creation : {{ facture.date_creation }}</th>
          <th class="w-[10%]" @click="currentFacture = currentFacture === facture.id ? undefined : facture.id">
              <span class="inline-flex items-center justify-center  ">

                <vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoplay="false" :height="100"
                              :width="100" :animationData="arrowDownCircle"/>
              </span>
          </th>
          <th></th>

        </tr>
        </thead>


        <tbody>
        <command v-if="currentFacture === facture.id" :orders="orders"/>
        </tbody>

      </table>
    </div>
  </div>

</template>
<script>
import axios from 'axios';
import command from './cmdOrder.vue'
import arrowDownCircle from "../../../assets/lottie/arrowDownCircle.json"

export default {
  components: {
    command
  },
  inject: ["showcmd"],

  provide() {
    return {}
  },

  data() {
    return {
      idfacture: "",
      factures: [],
      currentFacture: undefined,
      orders: [],
      arrowDownCircle,
      customer: "",
      id_customer: "",
      name_customer: ""


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
        console.log(this.orders)

        })
      }
    }
  },
  methods: {

    getAllfacture() {
      console.log();
      axios.get('http://localhost/filrouge/backend/public/FactureController/getAllfacture')
          .then(res => {

            this.factures = res.data
            this.id_customer = this.factures[0].customer_id;
            
            console.log(this.factures);
            this.factures.forEach(_ => this.showcmd.value.push(false))

          })
    },
    // async getCustomer(id_customer) {

    //   const res = await axios.post(
    //       "http://localhost/filrouge/backend/public/CustomerController/getAll_customer",
    //   )
    //   console.log(res.data);
    //   this.customer = res.data
    //   console.log(this.customer[0].name);


    // },

  },

  // http://localhost/filrouge/backend/public/FactureController/getAllCommande

};
</script>
