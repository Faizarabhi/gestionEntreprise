<template>


  <td>
    <select @change="getAllProduct($event)" name="" class="select select-bordered max-w-xs">
      <option disabled selected>Categorie</option>
      <option v-for="(cat, i) in categorie?.value" :key="i" :value="cat?.id">
        {{ cat?.name }}
      </option>
    </select>
  </td>
  <td>
    <select v-model="product" class="select select-bordered max-w-xs">
      <option disabled selected>Product</option>
      <option v-for="product in products" :key="product.id" :value="product">
        {{ product.ref_prdt }}
      </option>
    </select>
  </td>
  <td>
    <input v-model="quantity" type="number" placeholder="Type here" class="input input-bordered input-md max-w-xs"/>
  </td>
  <td> {{ this.product?.unite ?? 0 }}</td>
  <td>{{ this.product?.prix_unitaire ?? 0 }}</td>
  <td>{{ prix }}</td>

  <td class="inline-flex  " @click="removeCmd(command.id)">
    <vue3-lottie  ref="anim" :speed=".2" :autoPlay="false" :animationData="TrashData"/>

    <!--    todo: change to VUE3-Lottile-->
  </td>


</template>

<script>
import {computed} from "vue";
import TrashData from "../../assets/lottie/trashV2.json"

export default {

  props: ["command"],
  inject: ["removeCmd", "updateCmd", "categorie"],
  data() {
    return {
      TrashData,
      category: undefined,
      products: [],
      product: undefined,
      quantity: this.command.quantity,
      prix: computed(() => this.quantity * this.command.prix),
    };
  },
  watch: {
    product() {
      this.updateCmd(this.command.id, {
        product_id: this.product.id,
        prix: this.product.prix_unitaire,
      });
    },
    quantity() {
      this.updateCmd(this.command.id, {
        quantity: this.quantity,
      });
    },
  },
  methods: {
    async getAllProduct(event) {
      this.category = event.target.value;
      let res = await fetch(
          "http://localhost/filrouge/backend/public/ProductController/get_productBycategorie",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              id: this.category,
            }),
          }
      );
      this.products = await res.json();
    },

  },
};
</script>
