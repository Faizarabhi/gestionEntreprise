<template>
  <div class="w-full">
    <div
        class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
      <div class="py-8">
        <a href="#adduser" class="inline-flex items-center justify-center  ">

          <vue3-lottie @click="start" ref="anim" :speed=".2" :playOnHover="true" :autoPlay="false"
                       :animationData="userPlus"/>
        </a>
      </div>
      <div class="overflow-x-auto">
        <table class="table table-compact w-full">


          <thead>
          <tr>
            <th>Name</th>

            <th>Job</th>
            <th>Phone</th>
            <th>Email</th>
            <th></th>
            <th></th>

          </tr>
          </thead>
          <tbody>
          <!-- row 1 -->
          <tr v-for="(perso, i) in personnel" :key="i">

            <td>
              <div class="flex items-center space-x-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="../../../assets/images/about.svg" alt="Avatar Tailwind CSS Component"/>
                  </div>
                </div>
                <div>
                  <div class="font-bold">{{ perso.name }}</div>

                </div>
              </div>
            </td>

            <td>
              {{ perso.metier }}
            </td>
            <td>
              {{ perso.email }}
            </td>
            <td>{{ perso.tel }}</td>

            <td>
              <label for="edit">
                <a id="edit" v-on:click="handleUpdate(perso)" href="#update_personnel"
                   class="inline-flex items-center justify-center  ">

                  <vue3-lottie @click="start" ref="anim" :speed="1" :playOnHover="true" :autoPlay="false"
                               :animationData="edit"/>

                </a></label>

            </td>
            <td>

              <a @click="deletePersonnel(perso.id)" class="inline-flex items-center justify-center ">

                <vue3-lottie @click="start" ref="anim" :speed=".2" :autoPlay="false" :playOnHover="true"
                             :animationData="userX"/>
              </a>
            </td>
          </tr>
          <!-- row 2 -->
          </tbody>
        </table>
      </div>
    </div>
    <!-- ADD Personnel  -->
    <div class="modal" id="adduser">
      <div class="modal-box">
        <a href="#" for="my-modal-3"
           class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
        <h3 class="font-bold text-lg">ADD User!</h3>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.name"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.tel"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.email"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.password"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">photo </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.photo"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.metier"/>
        </div>

        <div class="modal-action">
          <button @click="addPersonnel()" for="my-modal-3" class="btn bg-primary border-none hover:bg-scroll-bleu">
            ADD
          </button>
        </div>
      </div>
    </div>

    <!--  Update Product! -->

    <div class="modal" id="update_personnel">
      <div class="modal-box relative">
        <a href="#" for="my-modal-3"
           class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
        <h3 class="text-lg font-bold">Update Personnel!</h3>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.name"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.tel"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.email"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.password"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">photo </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.photo"/>
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                 v-model="form.metier"/>
        </div>
        <div class="modal-action">
          <a @click="updatePersonnel(form.id)" href="#" for="my-modal-3"
             class="btn bg-primary border-none hover:bg-scroll-bleu">Update
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import userPlus from "../../../assets/lottie/userPlus.json";
import edit from "../../../assets/lottie/edit.json";
import userX from "../../../assets/lottie/userX.json"

export default {
  components: {},
  data() {
    return {
      userPlus,
      edit,
      userX,
      personnel: [],
      form: {
        id: "",
        name: "",
        email: "",
        password: "",
        tel: "",
        photo: "",
        metier: "",
      },
    };
  },
  mounted() {
    this.getAllPersonnel();
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
    handleUpdate(personnel) {
      // console.log("hello")
      this.form.id = personnel.id;
      this.form.name = personnel.name;
      this.form.email = personnel.email;
      this.form.password = personnel.password;
      this.form.tel = personnel.tel;
      this.form.photo = personnel.photo;
      this.form.metier = personnel.metier;
    },
    async getAllPersonnel() {
      let respons = await fetch(
          "http://localhost/filrouge/backend/public/personnelController/getAll_personnel"
      );
      this.personnel = await respons.json();
      console.log(this.personnel);
    },


    addPersonnel() {
      fetch(
          "http://localhost/filrouge/backend/public/PersonnelController/add_personnel",
          {
            method: "POST",
            body: JSON.stringify(this.form),
          }
      ).then((res) => res.json());
      // this.Personnel.push(this.form);
      this.getAllPersonnel();
      router.push("/Personnel");
    },

    updatePersonnel(id) {

      fetch(
          "http://localhost/filrouge/backend/public/PersonnelController/update_personnel",
          {
            method: "POST",
            body: JSON.stringify(this.form),
          }
      ).then((res) => res.json());
      this.getAllPersonnel();

    },

    deletePersonnel(id) {
      console.log(id)
      fetch(
          "http://localhost/filrouge/backend/public/PersonnelController/delete_personnel",
          {
            method: "DELETE",
            body: JSON.stringify({id: id}),
          }
      )
          .then((res) => res.json())
          .then((out) => console.log(out));
      this.getAllPersonnel();
    },
  },
  // http://localhost/filrouge/backend/public/PersonnelController/add_personnel
};
</script>
