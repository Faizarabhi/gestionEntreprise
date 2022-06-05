    <template>
    <div class="w-full ">
        <div
            class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full">

            <div class="py-8 ">
                <a href="#addproduct" class="inline-flex items-center justify-center  ">
                    <lottie-animation @mouseover="start('add')" @mouseleave="stop('add')" ref="add" :speed="1" :autoPlay="false"
                        path="lottie/plusToX.json" />

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
                            <th>Designation</th>
                            <th>Unite</th>
                            <th>Prix Unitaire</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(pro, i) in product" :key="pro">
                            <th>{{ pro.id }}</th>
                            <th>{{ pro.ref_prdt }}</th>
                            <td>{{ pro.categorie }}</td>
                            <td>{{ pro.designation }}</td>
                            <td>{{ pro.unite }}</td>
                            <td>{{ pro.prix_unitaire }}</td>

                            <td>
                                <a @click="handleUpdate(pro)" href="#update_product"
                                    class="inline-flex items-center justify-center ">
                                    <lottie-animation @mouseover="start('edit', i)" @mouseleave="stop('edit', i)"
                                        ref="edit" :speed="1" :autoPlay="false" path="lottie/edit.json" />
                                </a>
                            </td>
                            <td><a @click="deleteProduct(pro.id)" class="inline-flex items-center justify-center ">
                                    <lottie-animation @mouseover="start('trash', i)" @mouseout="stop('trash', i)"
                                        ref="trash" :speed=".1" :autoPlay="false" path="lottie/trashV2.json" />
                                </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD Product  -->
        <div class="modal" id="addproduct">
            <div class="modal-box">
                <a href="#" for="my-modal-3"
                    class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
                <h3 class="font-bold text-lg">ADD PRODUCT!</h3>
                <!-- `ref_prdt`, `designation`, `unite`, `categorie` -->
                <select @click="getAll_categorie" name="" class="select select-bordered max-w-xs">
                    <option disabled selected>Categorie</option>
                    <option v-for="(cat, i) in categorie" :key="i">
                        {{ cat.name }}
                    </option>
                </select>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Reference produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.ref_prdt" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Designation produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">unite produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.unite" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Categorie produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.categorie" />
                </div>
                <div class="modal-action">
                    <a @click="addProduct" href="#" for="my-modal-3" class="btn bg-dash-bleu hover:bg-scroll-bleu">ADD
                    </a>
                </div>
            </div>
        </div>



        <!--  Update Product! -->

        <div class="modal" id="update_product">
            <div class="modal-box relative">
                <a href="#" for="my-modal-3"
                    class="btn btn-sm bg-dash-bleu btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
                <h3 class="text-lg font-bold">Update Product!</h3>
                <input v-model="form.id" disabled />
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Reference produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.ref_prdt" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Designation produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">unite produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.unite" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Categorie produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.categorie" />
                </div>
                <div class="modal-action">
                    <a @click="updateProduct(form.id)" href="#" for="my-modal-3"
                        class="btn bg-dash-bleu hover:bg-scroll-bleu">Update
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

    <script>
import router from "@/router";
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
    components: {
        LottieAnimation
    },
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
                prix_unitaire: ""
            },
        };
    },
    mounted() {
        this.getAllProduct();
    },
    methods: {
        start(refName, index) {
            const el = index !== undefined ?  this.$refs[refName]?.[index] : this.$refs[refName];  
            el.anim.play();
        },
        stop(refName, index) {
            const el = index !== undefined ?  this.$refs[refName]?.[index] : this.$refs[refName];  
            el.anim.stop();
        },
        async getAllProduct() {
            let respons = await fetch(
                "http://localhost/filrouge/backend/public/ProductController/getAll_product"
            );
            this.product = await respons.json();
        },
        addProduct() {
            getAll_categorie()
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
            console.log(id);
            fetch(
                "http://localhost/filrouge/backend/public/ProductController/delete_product",
                {
                    method: "DELETE",
                    body: JSON.stringify({ id: id }),
                }
            )
                .then((res) => res.json())
                .then((out) => console.log(out));
            this.getAllProduct();
        },
        async getAll_categorie() {
            let respons = await fetch(
                "http://localhost/filrouge/backend/public/CategorieController/getAll_categorie"
            );
            this.categorie = await respons.json();
            // this.getAllProduct(id_categorie);
        },
    },
};
</script>