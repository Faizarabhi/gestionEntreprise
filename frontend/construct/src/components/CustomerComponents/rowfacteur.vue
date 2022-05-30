    <template>
    
        <th>
            <td>{{ i }}</td>
        <td>
        <select
            @change="getAllProduct($event)"
            name=""
            class="select select-bordered max-w-xs"
        >
            <option disabled selected>Categorie</option>
            <option v-for="(cat, i) in categorie?.value" :key="i" :value="cat?.id">
            {{ cat?.name }}
            </option>
        </select>
        </td>
        <td>
        <select v-model="infoproduct.productid"
        
            @change="getproduct($event)"
            class="select select-bordered max-w-xs"
        >
            <option disabled selected>Product</option>
            <option v-for="(pro, i) in product?.value" :key="i" :value="pro?.id">
            {{ pro?.ref_prdt }}
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
        <td  @click="addcmd">add cmd</td>
        </th>
        
    </template>

    <script>
    import { v4 as uuidv4 } from 'uuid'
    export default {
    props: {
        i: Number,
    },
    inject:["addCmd", "removeCmd",'updateCmd',"categorie"],
    
    data() {
        return {
            
        categ: 0,
        prod: 0,
        facturform:{
            idfact : "",
            idclient : this.$cookies.get("idcustomer"),

        },
        infoproduct: {
            idform: "",
            unite: "",
            productid : "",
            prixunitaire: "0",
            prixtotal: "0",
            multi: "",
        },
        infoarr : {"":  ""},

        multiple: "",
        info: {},
        };
    },
    mounted() {
        this.facturform.idfact = uuidv4();
        console.log(this.facturform.idfact)
        console.log(this.facturform);
    },
    methods: {
        
        
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
        // console.log(event.target.value);
        
        },
        addcmd(){
            this.infoproduct.idform = this.i ;
            this.infoarr = this.infoproduct 
            this.addCmd(this.infoarr)
        }
    },
    };
    </script>
