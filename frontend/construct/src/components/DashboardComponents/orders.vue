<template>
  <div class="bg-bg-bleu z-0 absolute pt-20 pl-60 h-screen w-screen">
    <div
      class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
    >
      <div class="overflow-x-auto">
        <table class="table table-compact w-full">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Job</th>
              <th>company</th>
              <th>location</th>
              <th>Last Login</th>
              <th>Favorite Color</th>
              <th>Favorite Color</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr v-for="index in 1" :key="index"> -->
            <tr v-for="order in order" :key="order">
              <td>{{order.id}}</td>
              <td>{{order.qte}}</td>
              <td>{{order.type_mouvement}}</td>
              <td>{{order.name}}</td>
              <td>{{order.tel}}</td>
              <td>{{order.ref_prdt}}</td>
              <td>{{order.email}}</td>
              <td>{{order.id_produit}}</td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import router from "@/router";

export default {
  data() {
    return {
      order: [],
      form: {
        id: "",
        qte: "",
        type_mouvement: "",
        id_customer: "",
        id_produit: "",
      },
    };
  },
  mounted() {
    this.getAllOrder();
  },
  methods: {
    async getAllOrder() {
      let respons = await fetch(
        "http://localhost/filrouge/backend/public/OrderController/getAll_order"
      );

      this.order = await respons.json();
      console.log(this.order);
    },
    
  },
  addOrder() {
        fetch(
            "http://localhost/filrouge/backend/public/OrderController/add_order",
            {
            method: "POST",
            body: JSON.stringify(this.form),
            }
        ).then((res) => res.json());
        this.Order.push(this.form);
        router.push("/Order");
        },
        updateOrder(id) {
        // console.log($id);
            this.form.id = id;
            // console.log(this.form.id)
        fetch(
            "http://localhost/filrouge/backend/public/OrderController/update_order",
            {
            method: "POST",
            body: JSON.stringify(this.form),
            }
        ).then((res) => res.json());
        router.push("/Order");
        },
        pushOrder: function () {
        // this.Order.push(this.form.Order);
        this.getAllOrder();
        console.log(this.form.Order);
        },
        deleteOrder(id) {
            // console.log(id)
        fetch(
            "http://localhost/filrouge/backend/public/OrderController/delete_order",
            {
            method: "POST",
            body: JSON.stringify(id),
            }
        )
            .then((res) => res.json())
            .then((out) => console.log(out));
            this.getAllOrder();
            
        },
  
};
</script>
