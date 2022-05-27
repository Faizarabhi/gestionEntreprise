    <template>
    <div class="bg-bg-bleu">
        <div class="grid grid-rows-2 place-content-center p-12">
        <div class="grid grid-cols-2 gap-24 place-content-center bg-white p-16">
            <div class="place-self-center">
            <img src="../../assets/images/logo.svg" />
            <p>Alex Fernández</p>
            <p>
            +6 49 62 05 35</p>
            <p>afsprodesign@gmail.com</p>
            </div>
            <div class="place-self-center">
            <h1 class="font-bold text-secondary">PRESUPUESTO</h1>
            <div class="">
                <h3 class="font-bold">Fetcha</h3>
                <p>05/01/2022</p>
            </div>
            <div>
                <h3 class="font-bold">Descripción</h3>
                Rediseño y mejora UX-UI del site www.afsdesign.es
            </div>
            </div>

            <div class="place-self-center col-span-2">
            <table class="table table-compact">
                <thead>
                <tr>
                    <th></th>
                    <th>Categorie</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Unité</th>
                    <th>Prix Unitaire HT</th>
                    <th>Prix Total HT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td >
                    <select class="select select-bordered max-w-xs">
                        <option disabled selected>Categorie</option>
                        <option v-for="cat in categorie" :key="cat"> {{cat.name}}</option>
                    </select>
                    </td>
                    <td>
                    <select class="select select-bordered max-w-xs">
                        <option disabled selected>Product</option>
                        <option v-for="pro in product" :key="pro"> {{pro.ref_prdt}}</option>
                    </select>
                    </td>
                    <td>
                    <input
                        type="number"
                        placeholder="Type here"
                        class="input input-bordered input-md max-w-xs"
                    />
                    </td>
                    <td>KG</td>
                    <td>67 . 00</td>
                    <td>670 . 00</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Categorie</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Unité</th>
                    <th>Prix Unitaire HT</th>
                    <th>Prix Total HT</th>
                </tr>
                </tfoot>
            </table>
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
        categorie: [],

        
        
        };
    },
    mounted() {
        
    },
    methods: {
        async getAllProduct() {
        let respons = await fetch(
            "http://localhost/filrouge/backend/public/ProductController/getAll_product"
        );
        this.product = await respons.json();

        },
        async getAll_categorie(){
        let respons = await    fetch (
                "http://localhost/filrouge/backend/public/CategorieController/getAll_categorie"
            );
            this.categorie = respons.json();
            
        }
    },
    };
    </script>
