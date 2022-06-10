<template>
  <div class="w-full p-8">

    <div>
      <div class="py-8">
        <a href="#addcustomer" class="inline-flex items-center justify-center  ">

          <vue3-lottie  ref="anim" :speed=".2" :autoPlay="false" :playOnHover="true"
            :animationData="userPlus" />

        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="table w-full">
          <!-- head -->
          <thead>
            <tr>
              <th>photo</th>
              <th>Name</th>
              <th>tel</th>
              <th>email</th>
              <th>metier</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <onecustomer />


          </tbody>
        </table>

      </div>

      <!-- The button to open modal -->
      <div class="modal" id="addcustomer">
        <div class="modal-box">
          <a href="#" for="my-modal-3"
            class="btn btn-sm bg-primary btn-circle border-none  absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
          <h3 class="font-bold text-lg">ADD Custumer!</h3>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
              v-model="form.name" />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">tel</span>
            </label>
            <input type="tel" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.tel" />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">email</span>
            </label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
              v-model="form.email" />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">metier</span>
            </label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
              v-model="form.metier" />
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">password</span>
            </label>
            <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs"
              v-model="form.password" />
          </div>

          <div
            class="w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
            <label for="dropzone-file" class="
                            flex flex-col
                            justify-center
                            items-center
                            rounded-lg
                            cursor-pointer
                            ">
              <span class="
                                flex
                                items-center
                                transition
                                ease-out
                                duration-300
                                hover:bg-secondary hover:text-white
                                bg-primary
                                w-8
                                h-8
                                px-2
                                rounded-full
                                text-bleu
                                cursor-pointer
                                ">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                  stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
              </span>
              <input name="Image" id="dropzone-file" @change="setImage" type="file" class="hidden" />
            </label>
          </div>
          <div class="modal-action">
            <button for="my-modal-3" class="btn bg-primary border-none   hover:bg-scroll-bleu" @click="addUser()">
              ADD
            </button>

          </div>
        </div>
      </div>
    </div>

  </div>
</template>
<script>
import axios from "axios";
import onecustomer from "./onecustomer.vue";
import userPlus from "../../../assets/lottie/userPlus.json";

import { toFormData } from "../../../utils/helpers";
import { cloudinaryConfig } from "../../../utils/constants";
const initialFormState = {
  id: "",
  name: "",
  email: "",
  password: "",
  tel: "",
  photo: "",
  metier: "",
};
export default {
  components: {
    onecustomer
  },
  data() {
    return {
      image: undefined,
      userPlus,
      form: initialFormState, uploadAuth: {
        timestamp: "",
        signature: "",
      },

    };
  },
  methods: {
    setImage(event) {
      this.image = event.target.files[0];
    },

    addcustomer() {
      fetch(
        "http://localhost/filrouge/backend/public/CustomerController/add_customer",
        {
          method: "POST",
          body: JSON.stringify(this.form),
        }
      )
        .then((res) => res.json())
        .then((user) => console.log(user));


    },
    async addUser() {
      // image upload to cloud
      // get publicId
      // add public to form data
      // submit form
      let cloudinaryData = {
        timestamp: this.uploadAuth.timestamp,
        signature: this.uploadAuth.signature,
        "api_key": cloudinaryConfig.apiKey,
        file: this.image,
        folder: cloudinaryConfig.folder
      };
      const formData = toFormData(cloudinaryData)
      const url = `https://api.cloudinary.com/v1_1/${cloudinaryConfig.cloudName}/image/upload`;
      const imageData = await axios.post(url, formData).then(res => res.data);
      // console.log(`https://res.cloudinary.com/${cloudinaryConfig.cloudName}/image/upload/v1654771394/${imageData.public_id}.jpg`)
      this.form.photo = imageData.public_id;
      const user = await axios.post(
        "http://localhost/filrouge/backend/public/CustomerController/add_customer",
        this.form)
      console.log(user);
      // this.$router.push("login");
    },
  }
}


</script>