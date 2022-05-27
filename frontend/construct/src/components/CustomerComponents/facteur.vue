    <template>
    <div class="bg-bg-bleu">
        <div class="grid grid-rows-2 place-content-center p-12">
        <div class="grid grid-cols-2 gap-24 place-content-center bg-white p-16">
            <div class="place-self-center">
            <img src="../../assets/images/logo.svg" />
            <p>Alex Fernández</p>
            <p>+6 49 62 05 35</p>
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
                                <button @click="addrow()">add row</button>

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
                <tr v-for="i in add" :key="i"> 
                    <th>{{i}}</th>
                    <td>
                    <select
                        @change="getAllProduct($event)"
                        name=""
                        class="select select-bordered max-w-xs"
                    >
                        <option disabled selected>Categorie</option>
                        <option
                        v-for="(cat, i) in categorie"
                        :key="i"
                        :value="cat.id"
                        >
                        {{ cat.name }}
                        </option>
                    </select>
                    </td>
                    <td>
                    <select @change="getproduct($event)" class="select select-bordered max-w-xs">
                        <option disabled selected>Product</option>
                        <option v-for="(pro,i) in product" 
                        :key="i" 
                        :value="pro.id">
                        {{ pro.ref_prdt }}
                        </option>
                    </select>
                    </td>
                    <td>
                    <input @change="prixTotal($event)"
                        type="number"
                        placeholder="Type here"
                        class="input input-bordered input-md max-w-xs"
                    />
                    </td>
                    <td ><input v-model="infoproduct.unite" disabled></td>
                    <td>{{infoproduct.prixunitaire}}</td>
                    <td >{{infoproduct.prixtotal}}</td>
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
        categorie: [],
        product: [],
        categ: 0,
        prod: 0,
        infoproduct:{
            idform : "",
            unite : "",
            prixunitaire : "0",
            prixtotal : "",
            multi : "",
        
        },
            add : 1,
        multiple :"",
        info : {}
        
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
        async getproduct(event){

            this.prod = event.target.value;
            // console.log(this.prod)
            // http://localhost/filrouge/backend/public/ProductController/get_product
            let resp = await fetch("http://localhost/filrouge/backend/public/ProductController/get_product",
            {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id : this.prod,
            }),
            }
            
            );
            this.info= await resp.json();
            this.infoproduct.unite = this.info.unite;
            // this.infoproduct.id = this.i;
            this.infoproduct.prixunitaire = this.info.prix_unitaire;
            this.multiple = this.infoproduct.multi;
            
            
            
            console.log(this.infoproduct.prixunitaire);
            
        },
        prixTotal(event){
            this.infoproduct.prixtotal = this.info.prix_unitaire * event.target.value;
            console.log(event.target.value)
        },
        addrow(){
            this.add = this.add + 1;
        }
    },
    };
    </script>
