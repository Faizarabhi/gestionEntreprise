<template>


  <tr>
    <td>referanse produit</td>
    <!-- <td></td> -->
    <td>prix unitaire</td>
    <td>quantite</td>
    <td>unite</td>
    <td></td>
  </tr>

  <tr v-for="order in orders" :key="order.commande_id">
    <td> {{ order.ref_prdt }}</td>
    <!-- <td>{{ order.designation }}</td> -->
    <td> {{ order.prix_unitaire }}</td>
    <td>{{ order.quantity }}</td>
    <td>{{ order.unite }}</td>
    <td>

      <a href="#updatecmd" class="inline-flex ">
        <lottie-animation @mouseover="start('edit', index)" @mouseout="stop('edit', index)" ref="edit"
                          :speed="2" :autoPlay="false" path="lottie/edit.json"/>
      </a>
    </td>

  </tr>
  <div class="modal" id="updatecmd">
    <div class="modal-box relative">
      <a href="#" for="my-modal-3"
         class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
      <h3 class="text-lg font-bold">Update Commande!</h3>


      <div class="modal-action">
        <a @click="updatec(form)" href="#" for="my-modal-3"
           class="btn bg-primary border-none hover:bg-scroll-bleu">Update
        </a>
      </div>
    </div>
  </div>

</template>
<script>

export default {
  components: {},
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