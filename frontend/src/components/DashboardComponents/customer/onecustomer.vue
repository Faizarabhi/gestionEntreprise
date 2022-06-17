  <template>

    <tr v-for="(customer, index) in customers" :key="customer.id">
      <td class="w-8 "><img :src="getImgUrl(customer.photo)"></td>
      <th>{{ customer.name }}</th>
      <td>{{ customer.tel }}</td>
      <td>{{ customer.email }}</td>
      <td>{{ customer.metier }}</td>
      <td><a href="#update_customer" @click="handleUpdate(customer)" class="inline-flex items-center justify-center ">

        <vue3-lottie  ref="anim" :speed=".2" :autoPlay="false" :playOnHover="true" :animationData="edit"/>
      </a>
      </td>

      <td><a @click="deleteCustomer(customer.id)" class="inline-flex items-center justify-center ">

        <vue3-lottie  ref="anim" :speed=".2" :autoPlay="false" :playOnHover="true"
                    :animationData="trashV2"/>
      </a></td>
    </tr>

    <!--  Update Product! -->

    <div class="modal" id="update_customer">
      <div class="modal-box relative">
        <a href="#" for="my-modal-3"
          class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
        <div class="flex flex-col justify-center items-center">
        <h3 class="text-lg font-bold text-secondary">Update Customer!</h3>
        <!-- <input v-model="form.id" disabled/> -->
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">name</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                v-model="form.name" disabled/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                v-model="form.metier"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                v-model="form.email"/>
        </div>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">tel</span>
          </label>
          <input type="tel" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                v-model="form.tel"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                v-model="form.password"/>
        </div>

        <div class="modal-action">
          <a @click="updateCustomer(form.idpro)" href="#" for="my-modal-3"
            class="btn bg-primary border-none hover:bg-scroll-bleu">Update
          </a>
        </div>
      </div></div>
    </div>
  </template>
  <script>
  import axios from 'axios';
  import trashV2 from "../../../assets/lottie/trashV2.json"
  import edit from "../../../assets/lottie/edit.json"
  import {getCloudinaryImgUrl} from "../../../utils/helpers";

  export default {
    components: {},


    data() {
      return {
        customers: [],
        edit,
        trashV2,
        form: {
          id: "",
          metier: "",
          name: "",
          tel: "",
          email: "",
          password: "",
          photo: "",
        },
      }
    },
    mounted() {
      this.getAllCustomer();
      console.log(this.getAllCustomer())
    },
    methods: {

      
      getAllCustomer() {

        axios.get('http://localhost/filrouge/backend/public/CustomerController/getAll_customer')
            .then(res => {
              this.customers = res.data
              console.log(this.customers)


            })
      },
      deleteCustomer(id) {
        console.log(id)
        fetch(
            "http://localhost/filrouge/backend/public/CustomerController/delete_customer",
            {
              method: "DELETE",
              body: JSON.stringify({id: id}),
            }
        )
            .then((res) => res.json())
            .then((out) => console.log(out))
        this.getAllCustomer()
      },
      handleUpdate(customers) {
        console.log("customers")
        console.log(customers)
        this.form.id = customers.id,
            this.form.email = customers.email,
            this.form.metier = customers.metier,
            this.form.name = customers.name,
            this.form.password = customers.password,
            this.form.photo = customers.photo,
            this.form.tel = customers.tel
      },
      updateCustomer(id) {
        
        console.log(this.form);
        http://localhost/filrouge/backend/public/CustomerController/update_customer
            fetch(
                "http://localhost/filrouge/backend/public/CustomerController/update_customer",
                {
                  method: "POST",
                  body: JSON.stringify(this.form),
                }
            ).then((res) => res.json());
        console.log(this.form);
        this.getAllProduct();
      },
      getImgUrl: getCloudinaryImgUrl,

    }
  }


  </script>