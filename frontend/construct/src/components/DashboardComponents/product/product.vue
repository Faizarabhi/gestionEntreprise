    <template>
    <div class="w-full ">
        <div
            class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full">

            <div class="py-8 ">
                <a href="#addproduct" class="inline-flex items-center justify-center  ">
                    <lottie-animation @mouseover="start('add')" @mouseleave="stop('add')" ref="add" :speed="1"
                        :autoPlay="false" path="lottie/plusToX.json" />

                </a>
            </div>
            <!-- The button to open modal -->

            <div class="overflow-x-auto">
                <table class="table table-compact w-full">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th>Designation</th>
                            <th>Unite</th>
                            <th>Categorie</th>
                            <th>Prix Unitaire</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(pro, i) in product" :key="pro">
                            <!-- <th>{{ pro.id }}</th> -->
                            <th>{{ pro.ref_prdt }}</th>
                            <td>{{ pro.name }}</td>
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
                            <td><a @click="deleteProduct(pro.idpro)" class="inline-flex items-center justify-center ">
                                    <lottie-animation @mouseover="start('trash', i)" @mouseout="stop('trash', i)"
                                        ref="trash" :speed=".1" :autoPlay="false" path="lottie/trashV2.json" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD Product  -->
        <div class="modal" id="addproduct">
            <div class="modal-box">
                <a href="#" for="my-modal-3"
                    class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
                <h3 class="font-bold text-lg">ADD PRODUCT!</h3>
                <select v-model="form.id_categorie" class="select select-bordered max-w-xs">
                    <option value="default" disabled>Categorie</option>
                    <option :value="cat.id" v-for="(cat, i) in categories" :key="i">
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
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.designation" />
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
                        <span class="label-text">prix_unitaire</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.prix_unitaire" />
                </div>
                <div class="modal-action">
                    <a @click="addProduct" href="#" for="my-modal-3"
                        class="btn bg-primary border-none hover:bg-scroll-bleu">ADD
                    </a>
                </div>
            </div>
        </div>



        <!--  Update Product! -->

        <div class="modal" id="update_product">
            <div class="modal-box relative">
                <a href="#" for="my-modal-3"
                    class="btn btn-sm bg-primary border-none btn-circle absolute right-2 hover:bg-scroll-bleu top-2">✕</a>
                <h3 class="text-lg font-bold">Update Product!</h3>
                <input v-model="form.idpro" disabled />
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Categorie produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.name" disabled />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Reference produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.ref_prdt" disabled />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Designation produit</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.designation" />
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
                        <span class="label-text">prix unitaire</span>
                    </label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        v-model="form.prix_unitaire" />
                </div>

                <div class="modal-action">
                    <a @click="updateProduct(form.idpro)" href="#" for="my-modal-3"
                        class="btn bg-primary border-none hover:bg-scroll-bleu">Update
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
            categories: [],
            form: {
                idpro: "",
                id: "",
                ref_prdt: "",
                designation: "",
                unite: "",
                id_categorie: "",
                name: "",
                prix_unitaire: ""
            },

        };
    },
    mounted() {
        this.getAllProduct();
        this.getAll_categorie();
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
        async getAllProduct() {

            let respons = await fetch(
                "http://localhost/filrouge/backend/public/ProductController/getAll_product"
            );
            this.product = await respons.json();
            console.log(this.product)
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
            this.form.idpro = product.idpro;
            this.form.id = product.id;
            this.form.ref_prdt = product.ref_prdt;
            this.form.designation = product.designation;
            this.form.unite = product.unite;
            this.form.name = product.name;
        },
        updateProduct(id) {
            fetch(
                "http://localhost/filrouge/backend/public/ProductController/update_product",
                {
                    method: "POST",
                    body: JSON.stringify(this.form),
                }
            ).then((res) => res.json());
            console.log(this.form);
            this.getAllProduct();
        },
        

        async getAll_categorie() {
            let respons = await fetch(
                "http://localhost/filrouge/backend/public/CategorieController/getAll_categorie"
            );
            this.categories = await respons.json();
            console.log(this.categories)
        },
        async getAllProductBycategorie(event) {
            this.category = event.target.value;
            let res = await fetch(
                "http://localhost/filrouge/backend/public/ProductController/get_productBycategorie",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        id: this.category,
                    }),
                }
            );
            console.log(this.res);
            this.products = await res.json();
        },
        deleteProduct(id) {
            console.log(id)
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
    },
};
</script>