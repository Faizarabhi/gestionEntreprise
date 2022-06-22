    <template>

  <div class="w-full p-20">
    <div class="py-8">
      <a href="#adduser" class="inline-flex items-center justify-center  ">

        <vue3-lottie ref="anim" :speed=".2" :playOnHover="true" :autoPlay="false" :animationData="userPlus" />
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
                    <img :src="getImgUrl(perso.photo)">
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

                  <vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoPlay="false" :animationData="edit" />

                </a></label>

            </td>
            <td>

              <a @click="deletePersonnel(perso.id)" class="inline-flex items-center justify-center ">

                <vue3-lottie ref="anim" :speed=".2" :autoPlay="false" :playOnHover="true" :animationData="userX" />
              </a>
            </td>
          </tr>
          <!-- row 2 -->
        </tbody>
      </table>
    </div>

    <!-- ADD Personnel  -->
    <div class="modal" id="adduser">
      <div class="modal-box">
        <a href="#" for="my-modal-3"
          class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
        <div class="flex flex-col justify-center items-center">
        <h3 class="font-bold text-lg text-secondary">ADD Personnel!</h3>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.name" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input type="tel" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.tel" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.email" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.password" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.metier" />
        </div>

</div>
        <div class="flex items-center justify-around">
          <div class="  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  ">
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
            <a href="#" for="my-modal-3" class="btn bg-primary border-none   hover:bg-scroll-bleu" @click="addPersonnel()">
              ADD
            </a>
          </div>
        </div>
      </div>
    </div>

    <!--  Update Product! -->

    <div class="modal" id="update_personnel">
      <div class="modal-box relative">
        <a href="#" for="my-modal-3"
          class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
        <div class="flex flex-col justify-center items-center">
        <h3 class="text-lg font-bold text-secondary">Update Personnel!</h3>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.name" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tel</span>
          </label>
          <input type="tel" placeholder="Type here" class="input input-bordered w-full max-w-xs" v-model="form.tel" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Email </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.email" />
        </div>
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Password </span>
          </label>
          <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.password" />
        </div>
        <!-- <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">photo </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.photo" />
        </div> -->
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">metier </span>
          </label>
          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
            v-model="form.metier" />
        </div>
        <div class="modal-action">
          <a @click="updatePersonnel(form.id)" href="#" for="my-modal-3"
            class="btn bg-primary border-none hover:bg-scroll-bleu">Update
          </a>
        </div>
        </div>
      </div>
    </div>
  </div>
</template>

    <script>
import userPlus from "../../../assets/lottie/userPlus.json";
import edit from "../../../assets/lottie/edit.json";
import userX from "../../../assets/lottie/userX.json"
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import axios from "axios";
import { toFormData, uploadToCloudinary } from "../../../utils/helpers";
import { cloudinaryConfig } from "../../../utils/constants";
import {getCloudinaryImgUrl} from "../../../utils/helpers";
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
  components: {},
  data() {
    return {
      userPlus,
      edit,
      userX,
      personnel: [],
      image: undefined,
      form: initialFormState, uploadAuth: {
        timestamp: "",
        signature: "",
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
    setImage(event) {
      this.image = event.target.files[0];
    },

    async fetchSignature() {
      const res = await axios.get("http://localhost/filrouge/backend/CloudinaryController/getSignature");
      this.uploadAuth = res.data;
    },
    async addPersonnel() {
      // image upload to cloud
      // get publicId
      // add public to form data
      // submit form
      this.form.photo = await uploadToCloudinary(this.image);
      // console.log(this.form.photo);
      // console.log("hello");
      const user = await axios.post(
        "http://localhost/filrouge/backend/public/PersonnelController/add_personnel",
        this.form)

      console.log(user);
  this.personnel.push(this.form);
      router.push("/profil");
    },
    addPersonnell() {
      fetch(
        "http://localhost/filrouge/backend/public/PersonnelController/add_personnel",
        {
          method: "POST",
          body: JSON.stringify(this.form),
        }
      ).then((res) => res.json());
      console.log("hello");
      // this.Personnel.push(this.form);
      Swal.fire({

        position: '',
        icon: 'success',
        title: 'Personnel Added',
        showConfirmButton: false,
        timer: 1500
      })
      this.getAllPersonnel();
    },

    updatePersonnel() {

      fetch(
        "http://localhost/filrouge/backend/public/PersonnelController/update_personnel",
        {
          method: "POST",
          body: JSON.stringify(this.form),
        }
      ).then((res) => res.json());
      Swal.fire({
        position: '',
        icon: 'success',
        title: 'Personnel Updated',
        showConfirmButton: false,
        timer: 1500
      })
      this.getAllPersonnel();

    },

    deletePersonnel(id) {
      console.log(id)
      fetch(
        "http://localhost/filrouge/backend/public/PersonnelController/delete_personnel",
        {
          method: "DELETE",
          body: JSON.stringify({ id: id }),
        }
      )
        .then((res) => res.json())
        .then((out) => console.log(out));
      Swal.fire({
        position: '',
        icon: 'success',
        title: 'Personnel Deleted',
        showConfirmButton: false,
        timer: 1500
      })
      this.getAllPersonnel();
    },
    getImgUrl: getCloudinaryImgUrl,
  },
  // http://localhost/filrouge/backend/public/PersonnelController/add_personnel
};
</script>
