    <template>
    <div>
        
        <th>{{ i }}</th>
        <td>
            <select
            @change="getAllProduct($event)"
            name=""
            class="select select-bordered max-w-xs"
            >
            <option disabled selected>Categorie</option>
            <option v-for="(cat, i) in categorie" :key="i" :value="cat.id">
                {{ cat.name }}
            </option>
            </select>
        </td>
        <td>
            <select
            @change="getproduct($event)"
            class="select select-bordered max-w-xs"
            >
            <option disabled selected>Product</option>
            <option v-for="(pro, i) in product" :key="i" :value="pro.id">
                {{ pro.ref_prdt }}
            </option>
            </select>
        </td>
        <td>
            <input
            @change="prixTotal($event)"
            type="number"
            placeholder="Type here"
            class="input input-bordered input-md max-w-xs"
            />
        </td>
        <td><input v-model="infoproduct.unite" disabled /></td>
        <td>{{ infoproduct.prixunitaire }}</td>
        <td>{{ infoproduct.prixtotal }}</td>
        
    </div>
    </template>

    <script>
    export default {
        props: {
            i:Number
        },
    data() {
        return {
        categorie: [],
        product: [],
        categ: 0,
        prod: 0,
        infoproduct: {
            idform: "",
            unite: "",
            prixunitaire: "0",
            prixtotal: "",
            multi: "",
        },
        
        multiple: "",
        info: {},
        };
    },
    mounted() {
        this.getAll_categorie();
    },
    methods: {
        async getAll_categorie(event) {
        let respons = await fetch(
            "http://localhost/filrouge/backend/public/CategorieController/getAll_categorie"
        );
        this.categorie = await respons.json();
        // this.getAllProduct(id_categorie);
        },
        async getAllProduct(event) {
        // console.log("hhh");
        this.categ = event.target.value;
        let res = await fetch(
            "http://localhost/filrouge/backend/public/ProductController/get_productBycategorie",
            {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: this.categ,
            }),
            }
        );
        this.product = await res.json();
        console.log(this.product);
        },
        async getproduct(event) {
        this.prod = event.target.value;
        // console.log(this.prod)
        // http://localhost/filrouge/backend/public/ProductController/get_product
        let resp = await fetch(
            "http://localhost/filrouge/backend/public/ProductController/get_product",
            {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: this.prod,
            }),
            }
        );
        this.info = await resp.json();
        this.infoproduct.unite = this.info.unite;
        // this.infoproduct.id = this.i;
        this.infoproduct.prixunitaire = this.info.prix_unitaire;
        this.multiple = this.infoproduct.multi;

        console.log(this.infoproduct.prixunitaire);
        },
        prixTotal(event) {
        this.infoproduct.prixtotal = this.info.prix_unitaire * event.target.value;
        console.log(event.target.value);
        },
        
    },
    };
    </script>
