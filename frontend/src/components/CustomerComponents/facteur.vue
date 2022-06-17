<template>
  <div class="bg-bg-bleu">

    <div class="grid grid-rows-2 place-content-center   p-12">
      <div class="grid grid-cols-2 gap-12 place-content-center bg-white p-16">
        <div class="place-self-center font-semibold">
          <img src="../../assets/images/logo.svg" />
          <h1 class="font-bold text-secondary">PRESUPUESTO</h1>
          <h3 class="font-bold">Fetcha</h3>
          <h3 class="font-bold">Descripción</h3>
          <p> Rediseño y mejora UX-UI </p>


        </div>
        <div class="place-self-center">
          <p>{{ name }} </p>
          <div class="">
            <p>{{ tel }} </p>
            <p>{{ this.date }}</p>
          </div>
          <div>

            <p>{{ email }} </p>
          </div>

        </div>

        <p>{{ id_fact }}</p>
        <div class="place-self-center col-span-2">
          <label for="addrows">
            <button v-if="sendcmd" class=" my-4 rounded-md text-white" id="addrows" @click="addrow()">
              <vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoplay="false" :height="100" :width="100"
                :animationData="PlusX" />
              <i class="fa-solid fa-plus"></i>
            </button>
          </label>
          <table class="table table-compact">
            <thead>
              <tr>
                <th>Categorie</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Unité</th>
                <th>Prix Unitaire HT</th>
                <th>Prix Total HT</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>


            <tbody>
              <tr v-for="command in data.list" :key="command.id">
                <rowfacteur :command="command" />
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>Prix Total:</td>

              </tr>
            </tfoot>
          </table>
          <div class="ml-[80%] my-8 p-4  ">
            <button class="bg-black w-20 h-12 rounded-md text-white" v-if="sendcmd" @click="submit"> Send <i
                class="fa-solid fa-paper-plane"></i></button>
            <button v-else class="w-8" @click='generatePDF'>
              <vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoPlay="false" :animationData="download" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import rowfacteur from "./rowfacteur.vue";
import { computed } from "vue";

import PlusX from "../../assets/lottie/plusToX.json"
import download from "../../assets/lottie/download.json"

export default {
  vuetify: new Vuetify(),
  components: {
    rowfacteur
  },
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
      downloadf:[],
      PlusX,
      download,
      add: 1,
      date: "",
      id: "",
      name: "",
      tel: "",
      email: "",
      metier: "",
      sendcmd: true,
      // data katjm3 hna kolha katruturna hna (id facteur) list katruturni tabl=>2 feh les cmds
      data: {
        list: [
          {
            id: this.getId(),
            product_id: "",
            quantity: 1,
            prix: 0,
          }
        ],

        customer_id: this.$cookies.get("idcustomer")
      },
      categorie: [],
      product: [],
      heading: "facture RabhiConstruction",
      moreText: [
        "This is another few sentences of text to look at it.",

      ],
    };
  },
  mounted() {

    this.getAll_categorie(),
      this.date_function(),
      this.name = this.$cookies.get("name"),
      this.email = this.$cookies.get("email"),
      this.tel = this.$cookies.get("tel")
    this.customer_id = this.$cookies.get("customer_id")
    // this.metier = $this.cookies.get("metier")
  },
  methods: {
    generatePDF() {
      
      const columns = [
        // CATEGORIE	PRODUIT	QUANTITÉ	UNITÉ	PRIX UNITAIRE HT	PRIX TOTAL HT	
        { title: "PRODUIT", dataKey: "PRODUIT" },
        { title: "UNITÉ", dataKey: "UNITE" },
        { title: "QUANTITÉ", dataKey: "QUANTITE" },
        { title: "UPRIX UNITAIRE HT", dataKey: "PRIXU" },
        { title: "PRIX TOTAL HT", dataKey: "PRIXT" },
        

      ];
      const doc = new jsPDF({
        orientation: "portrait",
        unit: "in",
        format: "letter"
      });
      // text is placed using x, y coordinates
      doc.setFontSize(16).text(this.heading, 0.5, 1.0);
      // create a line under heading
      doc.setLineWidth(0.01).line(0.5, 1.1, 8.0, 1.1);
      // Using autoTable plugin
      doc.autoTable({
        columns,
        body: this.items,
        margin: { left: 0.5, top: 1.25 },

      });
      // Using array of sentences
      doc
        .setFont("helvetica")
        .setFontSize(12)
        .text(this.moreText, 0.5, 3.5, { align: "left", maxWidth: "7.5" });

      // Creating footer and saving file
      doc
        .setFont("times")
        .setFontSize(11)
        .setFontStyle("italic")
        .setTextColor(0, 0, 255)
        .text(
          "This is a simple footer located .5 inches from page bottom",
          0.5,
          doc.internal.pageSize.height - 0.5
        )
        .save(`${this.heading}.pdf`);
    },


    async submit() {
      // send this.data to backend
      const res = await fetch("http://localhost/filrouge/backend/public/FactureController/create", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(this.data)
      }).then(r => r.json());
      this.sendcmd = false;
      this.downloadf = res.facture.commands
      console.log(res.facture.commands);
      res.facture.commands.forEach(element => {
            this.items.push({  PRODUIT: element.product.ref_prdt, UNITE:element.product.unite, PRIXU:element.product.prix_unitaire,
            QUANTITE:element.quantity, PRIXT:element.product.prix_unitaire * element.quantity},)
      });

    },
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
    // http://localhost/filrouge/backend/public/FacteurController/add_facteur
    // http://localhost/filrouge/backend/CommandController/add_commands

  },
  computed: {
    Qte (){

    },
    items() {
      return []
    }

  }
};
</script>
