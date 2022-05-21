    <template>
    <div class="bg-bg-bleu z-0 absolute pt-20 pl-60 h-screen w-screen">
        <div
        class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
        >
        <div class="py-8">
            <a
            href="#addproduct"
            class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-dash-bleu rounded-lg focus:shadow-outline hover:bg-scroll-bleu"
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
            <thead>
                <tr>
                <th></th>
                <th>Name</th>
                <th>Job</th>
                <th>company</th>
                <th>location</th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody v-for="index in 1" :key="index">
                <tr v-for="pro in product" :key="pro">
                <th>{{ pro.ref_prdt }}</th>
                <td>{{ pro.designation }}</td>
                <td>{{ pro.categorie }}</td>
                <td>{{ pro.unite }}</td>
                <td>{{ pro.unite }}</td>
                <td>Edit</td>
                <td>Update</td>
                <td>Delete</td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>

        <!-- Put this part before </body> tag -->
        <div class="modal" id="addproduct">
        <div class="modal-box">
            <a
            href="#"
            for="my-modal-3"
            class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
            >✕</a
            >
            <h3 class="font-bold text-lg">Congratulations random Interner user!</h3>
            <!-- `ref_prdt`, `designation`, `unite`, `categorie` -->
            <form @submit.prevent="addProduct">
            <div class="form-control w-full max-w-xs">
                <label class="label">
                <span class="label-text">Reference produit</span>
                </label>
                <input
                type="text"
                placeholder="Type here"
                class="input input-bordered w-full max-w-xs"
                v-model="form.ref_prdt"
                />
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                <span class="label-text">Designation produit</span>
                </label>
                <input
                type="text"
                placeholder="Type here"
                class="input input-bordered w-full max-w-xs"
                />
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                <span class="label-text">unite produit</span>
                </label>
                <input
                type="text"
                placeholder="Type here"
                class="input input-bordered w-full max-w-xs"
                v-model="form.unite"
                />
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                <span class="label-text">Categorie produit</span>
                </label>
                <input
                type="text"
                placeholder="Type here"
                class="input input-bordered w-full max-w-xs"
                v-model="form.categorie"
                />
            </div>
            <div class="modal-action">
                <button type="submite" @click="pushproduct"  class="btn bg-dash-bleu hover:bg-scroll-bleu">ADD 
                </button>
            </div>
            </form>
            <!-- <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p> -->
        </div>
        </div>
    </div>
    </template>

    <script>
    import router from "@/router";

    export default {
    data() {
        return {
        product: [],
        form: {
            ref_prdt: "",
            designation: "",
            unite: "",
            categorie: "",
        },
        };
    },
    mounted() {
        this.getAllProduct();
    },
    methods: {
        async getAllProduct() {
        let respons = await fetch(
            "http://localhost/filrouge/backend/public/ProductController/getAll_product"
        );
        this.product = await respons.json();
        },
        addProduct() {
        fetch(
            "http://localhost/filrouge/backend/public/ProductController/add_product",
            {
            method: "POST",
            body: JSON.stringify(this.form),
            }
        ).then((res) => res.json());
        router.push("/product");
        },
        updateProduct() {
        fetch(
            "http://localhost/filrouge/backend/public/ProductController/update_product",
            {
            method: "POST",
            body: JSON.stringify(this.form),
            }
        ).then((res) => res.json());
        router.push("/product");
        },
        pushproduct: function () {
        this.product.push(this.form.product);
        console.log(this.form.product);
        },
        deleteProduct() {
        fetch(
            "http://localhost/filrouge/backend/public/ProductController/delete_product",
            {
            method: "POST",
        body: JSON.stringify(id),
      })
        .then((res) => res.json())
        .then((out) => console.log(out));
        },
    },
    };
    </script>
