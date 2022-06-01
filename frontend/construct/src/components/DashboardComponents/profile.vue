<template>
  <div class="w-full">
        <div
        class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
        >
        <div class="py-8">
            <a
            href="#adduser"
            class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors  duration-150 bg-primary rounded-lg  focus:shadow-outline hover:bg-dash-bleu"
            >
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            </a>
        </div>
      <div class="overflow-x-auto">
            <table class="table table-compact w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <th>Name</th>
            <th>Job</th>
            <th>Phone</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr v-for="perso in personnel" :key="perso">
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <td>
              <div class="flex items-center space-x-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img
                      src="../../assets/images/about.svg"
                      alt="Avatar Tailwind CSS Component"
                    />
                  </div>
                </div>
                <div>
                  <div class="font-bold">{{ perso.name }}</div>
                  <div class="text-sm opacity-50">United States</div>
                </div>
              </div>
            </td>

            <td>
              {{ perso.metier }}
              <br />
              <span class="badge badge-ghost badge-sm"
                >Desktop Support Technician</span
              >
            </td>
            <td>{{ perso.tel }}</td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
            <th>
              <label for="edit"> 
              <a 
                id="edit" 
                v-on:click="handleUpdate(perso)"
                href="#update_personnel"
                class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-primary rounded-lg focus:shadow-outline hover:bg-scroll-bleu "
              ></a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </label>
            
            </th>
            <th>
              <label for="delete">
              <input id="delete" class="hidden" @click="deletePersonnel(perso.id)" > 
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></label>
            </th>
          </tr>
          <!-- row 2 -->
        </tbody>
        <!-- foot -->
        <tfoot>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Job</th>
            <th>Phone</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
    </div>
    <!-- ADD Personnel  -->
    <div class="modal" id="adduser">
      <div class="modal-box">
        <a
          href="#"
          for="my-modal-3"
          class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
          >✕</a
        >
        <h3 class="font-bold text-lg">ADD User!</h3>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.name"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.tel"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.email"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.password"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">photo </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.photo"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.metier"
          />
        </div>

        <div class="modal-action">
          <button
            @click="addPersonnel()"
            for="my-modal-3"
            class="btn bg-dash-bleu hover:bg-scroll-bleu"
          >
            ADD
          </button>
        </div>
      </div>
    </div>

    <!--  Update Product! -->

    <div class="modal" id="update_personnel">
      <div class="modal-box relative">
        <a
          href="#"
          for="my-modal-3"
          class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
          >✕</a
        >
        <h3 class="text-lg font-bold">Update Personnel!</h3>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.name"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.tel"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.email"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.password"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">photo </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.photo"
          />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full max-w-xs"
            v-model="form.metier"
          />
        </div>
        <div class="modal-action">
          <a
            @click="updatePersonnel(form.id)"
            href="#"
            for="my-modal-3"
            class="btn bg-dash-bleu hover:bg-scroll-bleu"
            >Update
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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

    // getPersonnel(id) {
    // fetch(
    //     "http://localhost/filrouge/backend/public/personnelController/get_personnel",
    //     {
    //     method: "POST",
    //     body: JSON.stringify(this.id),
    //     }
    // ).then((res) => res.json());

    // router.push("/Personnel");
    // },

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
      // console.log($id);
      // this.form.id = id;
      // console.log(this.form.id)
      fetch(
        "http://localhost/filrouge/backend/public/PersonnelController/update_personnel",
        {
          method: "POST",
          body: JSON.stringify(this.form),
        }
      ).then((res) => res.json());
      this.getAllPersonnel();
      router.push("/Personnel");
    },
    // pushPersonnel: function () {
    //   // this.Personnel.push(this.form.Personnel);
    //   this.getAllPersonnel();
    //   console.log(this.form.Personnel);
    // },
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
