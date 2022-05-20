<template>
  <div>
    <div class="md:flex md:p-6 bg-gray-50">
      <div class="hidden md:block h-full md:p-36">
        <img src="../assets/images/slide1.jpg" class="w-96" alt="" />
      </div>
      <div class="h-full p-20 md:p-36">
        <div class="-mb-16">
          <label class="block mb-2 text-3xl font-bold text-gray-900"
            >Votre espace client
            <span class="font-medium text-sm">Rabhi Construction</span></label
          >
          <form @submit.prevent="addUser">
            <div class="relative z-0 w-full mb-6 group">
              <input
                type="text"
                class="border border-gray-300 w-48 md:w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Taper name"
                v-model="form.name"
              />
              <input
                type="email"
                class="border border-gray-300 w-48 md:w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Taper Email Verfication"
                v-model="form.email"
              />
              <input
                type="password"
                class="border border-gray-300 w-48 md:w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Mot de passe"
                v-model="form.password"
              />
              <input
                type="tel"
                class="border border-gray-300 w-48 md:w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Votr numero de telephone"
                v-model="form.tel"
              />
              <input
                type="password"
                class="border border-gray-300 w-48 md:w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Mot de passe veréfier"
              />
              <a
                href="/login"
                class="text-sm font-medium text-primary underline block"
                >Avez vous déja un compte ?
              </a>

              <button
                type="submit"
                class="bg-black text-white md:px-32 rounded mt-8 py-2"
              >
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
import router from "@/router";
const formadduser = {
  name: "",
  tel: "",
  photo: "",
  type: "",
  email: "",
  password: "",
};
export default {
  data() {
    return { form: formadduser };
  },
  methods: {
    addUser() {
      fetch(
        "http://localhost/filrouge/backend/public/CustomerController/add_customer",
        {
          method: "POST",
          body: JSON.stringify(this.form),
        }
      )
        .then((res) => res.json())
        .then((user) =>
         console.log("user addede")
        );
      router.push("login");
      this.form = formadduser;
    },
  },
};
</script>
