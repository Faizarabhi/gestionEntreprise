  <template>
    <div class="w-full">
      <div
        class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
      >
        <div class="py-8">
          <a
            href="#addcmd"
            class="inline-flex items-center justify-center "
          >
                                        <lottie-animation @click="start" ref="anim" :speed=".2" :autoPlay="false" path="lottie/plusToX.json" />

          </a>
        </div>
        <table class="table table-compact w-full">
          <thead>
            <tr>
              <th>ID Order</th>
              <th>Produit</th>
              <th>Quantite</th>
              <th>Type Order</th>
              <th>Name</th>
              <th>Client</th>
              <th>Tel</th>
              <th>email</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr v-for="index in 1" :key="index"> -->
            <tr v-for="order in order" :key="order">
              <td>{{ order.id }}</td>
              <td>{{ order.name }}</td>
              <td>{{ order.ref_prdt }}</td>
              <td>{{ order.qte }}</td>
              <td>{{ order.type_mouvement }}</td>
              <td>{{ order.name }}</td>
              <td>{{ order.tel }}</td>
              <td>{{ order.email }}</td>

              <td>
                <a
                  @click="updatePersonnel(order.id)"
                  href="#update_product"
                  class="inline-flex items-center justify-center  "
                >
                                              <lottie-animation @click="start" ref="anim" :speed=".2" :autoPlay="false" path="lottie/edit.json" />
</a
                >
              </td>
              <td>
                <a @click="deleteOrder(order.id)"  class="inline-flex items-center justify-center  ">
                            <lottie-animation @click="start" ref="anim" :speed=".2" :autoPlay="false" path="lottie/trashV2.json" />

                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Update  -->

      <div class="modal" id="update_product">
        <div class="modal-box relative">
          <a
            href="#"
            for="my-modal-3"
            class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
            >✕</a
          >
          <h3 class="text-lg font-bold">Update Commande!</h3>
          <input v-model="form.id" disabled />
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Reference Commande</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.ref_prdt"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Designation produit</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Qte produit</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.unite"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Customer ID</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.categorie"
            />
          </div>
          <div class="modal-action">
            <a
              @click="updateCommande(form.id)"
              href="#"
              for="my-modal-3"
              class="btn bg-dash-bleu hover:bg-scroll-bleu"
              >Update
            </a>
          </div>
        </div>
      </div>

      <!-- ADD  -->
      <div class="modal" id="addcmd">
        <div class="modal-box">
          <a
            href="#"
            for="my-modal-3"
            class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
            >✕</a
          >
          <h3 class="font-bold text-lg">ADD Command!</h3>
          <!-- `ref_prdt`, `designation`, `unite`, `categorie` -->

          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Reference Commande</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.ref_prdt"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Designation produit</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Qte produit</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.unite"
            />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Customer ID</span>
            </label>
            <input
              type="text"
              placeholder="Type here"
              class="input input-bordered w-full max-w-xs"
              v-model="form.categorie"
            />
          </div>
          <div class="modal-action">
            <a
              @click="addOrder"
              href="#"
              for="my-modal-3"
              class="btn bg-dash-bleu hover:bg-scroll-bleu"
              >ADD
            </a>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>
  import router from "@/router";
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
    components: {
        LottieAnimation
    },
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
      console.log(id);
      // fetch(
      //     "http://localhost/filrouge/backend/public/OrderController/delete_order",
      //     {
      //     method: "POST",
      //     body: JSON.stringify(id),
      //     }
      // )
      //     .then((res) => res.json())
      //     .then((out) => console.log(out));
      //     this.getAllOrder();
    },
  };
  </script>
