    <template>
        <div> hhhh
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
        </div>
    </template>

    <script>
    export default {
        props: {
        name: {
            getAllProduct: Function,
            prixTotal: Function,
            getproduct:Function,
            infoproduct: Object,
            i: Function,
            product: Array,
            categorie: Array

        }
        }
    }
    </script>