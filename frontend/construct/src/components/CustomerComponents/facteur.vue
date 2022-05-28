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
                            <p>{{this.date}}</p>
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
                            <tr v-for="i in add" :key="i">
                                <rowfacteur :i="i"/>
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
                export default {
                components: { rowfacteur },
                data(){
                    return{
                        add: 1,
                        date : ""
                        }
                }, 
                mounted() {
                    this.date_function()
                },
                methods: {
                    addrow() {
                    this.add = this.add + 1;
                    console.log(this.add)
                    },
                    date_function() {
            
                        
                        var formatted_date = new Date().toJSON().slice(0,10).replace(/-/g,'/');
                        this.date =formatted_date ;
                        console.log(this.date)
                
                    },
                    
                    
                },
                };
                </script>
