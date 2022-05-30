                        <template>
                        <div class="bg-bg-bleu">
                            <div class="grid grid-rows-2 place-content-center p-12">
                            <div class="grid grid-cols-2 gap-24 place-content-center bg-white p-16">
                                <div class="place-self-center">
                                <img src="../../assets/images/logo.svg" />
                                <p>Alex Fernández </p>
                                <p>+6 49 62 05 35</p>
                                <p>afsprodesign@gmail.com</p>
                                </div>
                                <div class="place-self-center">
                                <h1 class="font-bold text-secondary">PRESUPUESTO</h1>
                                <div class="">
                                    <h3 class="font-bold">Fetcha</h3>
                                    <p>{{this.date}}</p>
                                </div>
                                <div>
                                    <h3 class="font-bold">Descripción</h3>
                                    <p> Rediseño y mejora UX-UI del site www.afsdesign.es</p>

                                </div>
            
                                </div>
                                    
                                    <p>{{id_fact}}</p>
                                <div class="place-self-center col-span-2">
                                <button @click="addrow()">add row</button>

                                <table class="table table-compact">
                                    <thead>
                                <tr>
                                    <th>
                                    <td></td>
                                    <td>Categorie</td>
                                    <td>Produit</td>
                                    <td>Quantité</td>
                                    <td>Unité</td>
                                    <td>Prix Unitaire HT</td>
                                    <td>Prix Total HT</td></th>
                                </tr>
                                </thead>
                                    
                                    
                                    <tbody>
                                    <tr v-for="command in data.list" :key="command.id">
                                        <rowfacteur :command="command"/>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    
                                <tr>
                                
                                    <th>
                                    <td></td>
                                    <td>Categorie</td>
                                    <td>Produit</td>
                                    <td>Quantité</td>
                                    <td>Unité</td>
                                    <td>Prix Unitaire HT</td>
                                    <td>Prix Total HT</td>
                                    </th>
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
    import rowfacteur from "../CustomerComponents/rowfacteur.vue";
    import { computed } from "vue";

    export default {
    components: { rowfacteur },
    inject: ["id_fact"],
    provide() {
        return {
        addCmd: this.addCmd,
        updateCmd: this.updateCmd,
        removeCmd: this.removeCmd,
        categorie: computed(() => this.categorie),
        product: computed(() => this.product),
        };
    },

    data() {
        return {
        add: 1,
        date: "",
        // data katjm3 hna kolha katruturna hna (id facteur) list katruturni tabl=>2 feh les cmds
        data: {
            id: this.getId(),
            list: [],
        },
        categorie: [],
        product: [],
        };
    },
    mounted() {
        this.getAll_categorie();
        this.date_function(), console.log(this.$cookies.get("idcustomer"));
    },
    methods: {
        getId() {
        return (
            Math.random().toString(36).slice(2) + new Date().getTime().toString(36)
        );
        },
        async getAllProduct(event) {
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
        },

        async getAll_categorie() {
        let respons = await fetch(
            "http://localhost/filrouge/backend/public/CategorieController/getAll_categorie"
        );
        this.categorie = await respons.json();
        // this.getAllProduct(id_categorie);
        },
        addCmd(cmd) {
        this.data.list.push({ ...cmd, id: this.data.list.length });
        console.log(this.data.list);
        },
        updateCmd(id, updates) {
        this.data.list = this.data.list.map((c, i) => {
            if (c.id === id) {
            return { ...c, ...updates };
            }
            return c;
        });
        },
        removeCmd(id) {
        this.data.list = this.data.list.filter((cmd, i) => cmd.id !== id);
        },
        addrow() {
        // this.add = this.add + 1;
        // console.log(this.add)
        const data = {
            id: this.getId(),
            product_id: "",
            quantity: 1,
            prix: 0,
        };
        //   console.log(data);
        this.data.list.push(data);
        },
        date_function() {
        var formatted_date = new Date().toJSON().slice(0, 10).replace(/-/g, "/");
        this.date = formatted_date;
        console.log(this.date);
        },
    },
    };
    </script>
