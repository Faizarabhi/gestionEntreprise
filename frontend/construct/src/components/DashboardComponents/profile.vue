<template>
  <div class="bg-bg-bleu z-0 absolute pt-20 pl-60 h-screen w-screen">
    <div
      class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
    >
      <table class="table w-full">
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
            <!-- email: "ahmad@gmail.com"
id: 1
metier: "Job"
name: "ahmad"
password: "1234"
photo: "[value-6]"
tel: "+88 06 77 99" -->
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
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      personnel: [],
      form: {
        id : "",
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
      this.Personnel.push(this.form);
      router.push("/Personnel");
    },
  },
  updatePersonnel(id) {
    // console.log($id);
    this.form.id = id;
    // console.log(this.form.id)
    fetch(
      "http://localhost/filrouge/backend/public/PersonnelController/update_personnel",
      {
        method: "POST",
        body: JSON.stringify(this.form),
      }
    ).then((res) => res.json());
    router.push("/Personnel");
  },
  pushPersonnel: function () {
    // this.Personnel.push(this.form.Personnel);
    this.getAllPersonnel();
    console.log(this.form.Personnel);
  },
  deletePersonnel(id) {
    // console.log(id)
    fetch(
      "http://localhost/filrouge/backend/public/PersonnelController/delete_personnel",
      {
        method: "POST",
        body: JSON.stringify(id),
      }
    )
      .then((res) => res.json())
      .then((out) => console.log(out));
    this.getAllPersonnel();
  },
  // http://localhost/filrouge/backend/public/PersonnelController/add_personnel
};
</script>
