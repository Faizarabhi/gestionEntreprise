  <template>
  <div>
    <div class="flex h-screen  ">
      <div class="hidden flex-1 lg:flex  lg:items-center lg:justify-center   bg-bg-bleu">
        <img src="../assets/images/build2.jpg" class="w-[80%]" alt="" />
      </div>

      <div class="flex-1 flex  items-center justify-center   ">
        <div>
          <label class=" mb-2 text-3xl font-bold text-gray-900">Votre Espace
            <span class="font-medium text-sm">Rabhi Construction</span></label>
          <form @submit.prevent="addUser">
            <div class="relative z-0 w-full mb-6 group">
              <input type="text"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Taper name" v-model="form.name" />

              <input type="tel"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Votr numero de telephone" v-model="form.tel" />
              <input type="text"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Votr  metier" v-model="form.metier" />

              <input type="email"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Taper Email " v-model="form.email" />
              <input type="password"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Mot de passe" v-model="form.password" />
              <input type="password"
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Mot de passe veréfier" v-model="form.passwrd" />
              <div class="p-4 mt-4 rounded alert-success shadow-lg text-secondary font-medium flex"
                v-if=' form.password != null && form.password === form.passwrd  '>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>  mot de passe correct</span>
              </div>
              <div class="p-4 mt-4 rounded alert-error shadow-lg text-secondary font-medium flex"
                v-else='form.password != null &&   form.password != form.passwrd  '> <svg xmlns="http://www.w3.org/2000/svg"
                  class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg><span>  mot de passe incorrect</span></div>

              <div
                class="order border-gray-300  md:w-96 mt-4 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
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
                  <input accept="image/png, image/gif, image/jpeg" name="Image" id="dropzone-file" @change="setImage"
                    type="file" class="hidden" />
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
import { toFormData, uploadToCloudinary } from "../utils/helpers";
import { cloudinaryConfig } from "../utils/constants";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
const initialFormState = {
  name: "",
  tel: "",
  photo: "",
  metier: "",
  email: "",
  password: "",
  passwrd: "",
};
export default {
  data() {
    return {

      form: initialFormState, uploadAuth: {
        timestamp: "",
        signature: "",

      },
      image: undefined
    };
  },
  mounted() {
    this.fetchSignature();

  },
  methods: {
    setImage(event) {
      this.image = event.target.files[0];
    },
    async fetchSignature() {
      const res = await axios.get("http://localhost/filrouge/backend/CloudinaryController/getSignature");
      this.uploadAuth = res.data;
    },
    async addUser() {

      this.form.photo = await uploadToCloudinary(this.image);
      if (this.form.password === this.form.passwrd) {
        const user = await axios.post(
          "http://localhost/filrouge/backend/public/CustomerController/add_customer",
          this.form)
        Swal.fire({
          title: 'Your Email is save it please    : CL-' + this.form.email,
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })

        console.log(user);

        this.$router.push("login");
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "mot de pass n'est pas correct",

        })
      }
    },
  },
};
</script>
