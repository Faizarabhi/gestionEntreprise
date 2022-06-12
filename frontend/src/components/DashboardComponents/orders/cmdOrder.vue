  <template>


    <tr>
      <td>referanse produit</td>
      <!-- <td></td> -->
      <td>Designation </td>
      <td>prix unitaire</td>
      <td>quantite</td>
      <td>unite</td>
      <td></td>
    </tr>

    <tr v-for="order in orders" :key="order.commande_id">
      <td> {{ order.ref_prdt }}</td>
      <td>{{ order.designation }}</td>
      <td> {{ order.prix_unitaire }}</td>
      <td>{{ order.quantity }}</td>
      <td>{{ order.unite }}</td>
      <td>

        <a href="#updatecmd" class="inline-flex ">

          <vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoplay="false" :height="100" :width="100"
            :animationData="edit" />
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
  import edit from "../../../assets/lottie/edit.json"

  export default {

    props: ["orders"],

  }
  </script>