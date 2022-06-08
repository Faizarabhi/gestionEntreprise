<template>
  <div>
    <div class="flex h-screen  ">
      <div class="flex-1 flex flex-col items-center justify-center   bg-bg-bleu">
        <img src="../assets/images/build2.jpg" class="w-[80%]" alt=""/>
      </div>

      <div class="flex-1 flex flex-col items-center justify-center   ">
        <div class="-mb-16">
          <label class="block mb-2 text-3xl font-bold text-gray-900">Votre Espace
            <span class="font-medium text-sm">Rabhi Construction</span></label>
          <form @submit.prevent="addUser">
            <div class="relative z-0 w-full mb-6 group">
              <input type="text"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Taper name" v-model="form.name"/>

              <input type="tel"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Votr numero de telephone" v-model="form.tel"/>
              <input type="text"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Votr  metier" v-model="form.metier"/>

              <input type="email"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Taper Email " v-model="form.email"/>
              <input type="password"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Mot de passe" v-model="form.password"/>
              <input type="password"
                     class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                     placeholder="Mot de passe veréfier"/>
              <div
                  class="border border-gray-300 w-48 md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
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
                  <input name="Image" id="dropzone-file" @change="setImage" type="file" class="hidden"/>
                </label>
              </div>
              <a href="/login" class="text-sm font-medium text-primary underline block">Avez vous déja un compte ?
              </a>

              <button type="submit" class="bg-secondary text-white md:px-32 rounded mt-4 w-full py-2">
                Me connecter
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

const formadduser = {
  name: "",
  tel: "",
  photo: "",
  metier: "",
  email: "",
  password: "",
};
export default {
  data() {
    return {
      form: formadduser, uploadAuth: {
        timestamp: "",
        signature: "",
      }
    };
  },
  mounted() {
    this.fetchSignature();
  },
  methods: {
    setImage(event) {
      let image = event.target.files[0];
      console.log(image);
    },
    async fetchSignature() {
      const res = await axios.get("http://localhost/filrouge/backend/CloudinaryController/getSignature");
      console.log(res.data);
    },
    addUser() {
      fetch(
          "http://localhost/filrouge/backend/public/CustomerController/add_customer",
          {
            method: "POST",
            body: JSON.stringify(this.form),
          }
      )
          .then((res) => res.json())
          .then((user) => console.log("user addede"));
      this.$router.push("login");
      this.form = formadduser;
    },
  },
};
</script>
