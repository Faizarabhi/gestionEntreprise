<template>
  <div class="w-full">
        <div
        class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
        >
        <div class="py-8">
            <a
            href="#adduser"
            class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-primary rounded-lg focus:shadow-outline hover:bg-scroll-bleu"
            >
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                <path
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd"
                fill-rule="evenodd"
                ></path>
            </svg>
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
            <th>Favorite Color</th>
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
              <a
                v-on:click="handleUpdate(perso)"
                href="#update_personnel"
                class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-primary rounded-lg focus:shadow-outline hover:bg-scroll-bleu"
              ></a>
            </th>
            <th>
              <a @click="deletePersonnel(perso.id)" key=""> Delete</a>
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
            <th>Favorite Color</th>
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
        " http://localhost/filrouge/backend/public/personnelController/getAll_personnel"
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
      // console.log(id)
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
