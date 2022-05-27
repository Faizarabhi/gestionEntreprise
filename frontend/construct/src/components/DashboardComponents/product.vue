    <template>
    <div class="w-full">
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
        <!-- The button to open modal -->

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
                <th>{{ pro.id }}</th>
                <th>{{ pro.ref_prdt }}</th>
                <td>{{ pro.designation }}</td>
                <td>{{ pro.categorie }}</td>
                <td>{{ pro.unite }}</td>
                <td>{{ pro.unite }}</td>

                <td>
                    <a
                    @click="handleUpdate(pro)"
                    href="#update_product"
                    class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-dash-bleu rounded-lg focus:shadow-outline hover:bg-scroll-bleu"
                    ></a>
                </td>
                <td><a @click="deleteProduct(pro.id)"> Delete</a></td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>

        <!-- ADD Product  -->
        <div class="modal" id="addproduct">
        <div class="modal-box">
            <a
            href="#"
            for="my-modal-3"
            class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
            >✕</a
            >
            <h3 class="font-bold text-lg">ADD PRODUCT!</h3>
            <!-- `ref_prdt`, `designation`, `unite`, `categorie` -->

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
            <a
                @click="addProduct"
                href="#"
                for="my-modal-3"
                class="btn bg-dash-bleu hover:bg-scroll-bleu"
                >ADD
            </a>
            </div>
        </div>
        </div>



        <!--  Update Product! -->

        <div class="modal" id="update_product">
        <div class="modal-box relative">
            <a
            href="#"
            for="my-modal-3"
            class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2"
            >✕</a
            >
            <h3 class="text-lg font-bold">Update Product!</h3>
            <input v-model="form.id" disabled />
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
            <a
                @click="updateProduct(form.id)"
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
    import router from "@/router";

    export default {
    data() {
        return {
        product: [],
        title: "",
        form: {
            id: "",
            ref_prdt: "",
            designation: "",
            unite: "",
            categorie: "",
            prix_unitaire:""
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
        this.product.push(this.form);
        router.push("/product");
        },
        handleUpdate(product) {
        this.form.id = product.id;
        this.form.ref_prdt = product.ref_prdt;
        this.form.designation = product.designation;
        this.form.unite = product.unite;
        this.form.categorie = product.categorie;
        },
        updateProduct(id) {
        // console.log($id);
        // this.form.id = $id;
        // console.log(this.form.id)
        fetch(
            "http://localhost/filrouge/backend/public/ProductController/update_product",
            {
            method: "POST",
            body: JSON.stringify(this.form),
            }
        ).then((res) => res.json());
        this.getAllProduct();
        // router.push("/product");
        },
        pushproduct: function () {
        // this.product.push(this.form.product);
        this.getAllProduct();
        console.log(this.form.product);
        },
        deleteProduct(id) {
            // console.log(id);
        fetch(
            "http://localhost/filrouge/backend/public/ProductController/delete_product",
            {
            method: "DELETE",
            body: JSON.stringify({id: id}),
            }
        )
            .then((res) => res.json())
            .then((out) => console.log(out));
        this.getAllProduct();
        },
    },
    };
    </script>
