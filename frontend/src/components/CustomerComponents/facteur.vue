<template>
  <div class="bg-bg-bleu">

    <div class="grid grid-rows-2 place-content-center   p-12">
      <div class="grid grid-cols-2 gap-12 place-content-center bg-white p-16">
        <div class="place-self-center font-semibold">
          <img src="../../assets/images/logo.svg" />
          <p>{{ name }} </p>
          <p>{{ tel }} </p>
          <p>{{ email }} </p>

        </div>
        <div class="place-self-center">
          <h1 class="font-bold text-secondary">PRESUPUESTO</h1>
          <div class="">
            <h3 class="font-bold">Fetcha</h3>
            <p>{{ this.date }}</p>
          </div>
          <div>
            <h3 class="font-bold">Descripción</h3>
            <p> Rediseño y mejora UX-UI del site www.afsdesign.es</p>

          </div>

        </div>

        <p>{{ id_fact }}</p>
        <div class="place-self-center col-span-2">
          <label for="addrows">
            <button class=" my-4 w-20 h-12 rounded-md text-white" id="addrows" @click="addrow()">
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
          <div class="ml-[80%] my-8 p-4 ">
            <button class="bg-black w-20 h-12 rounded-md text-white" @click="submit"> Send  <i
                class="fa-solid fa-paper-plane"></i></button>
          </div>
        </div>
        
        <v-btn  class="w-8" @click='generatePDF'><vue3-lottie ref="anim" :speed="1" :playOnHover="true" :autoPlay="false" :animationData="download" /></v-btn>

      </div>
    </div>
  </div>
</template>
<script>
import rowfacteur from "./rowfacteur.vue";
import { computed } from "vue";

import PlusX from "../../assets/lottie/plusToX.json"
import download from "../../assets/lottie/download.json"

const downloadf = [];
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
      PlusX,
      download,
      add: 1,
      date: "",
      id: "",
      name: "",
      tel: "",
      email: "",
      metier: "",

      // data katjm3 hna kolha katruturna hna (id facteur) list katruturni tabl=>2 feh les cmds
      data: {
        list: [],

        customer_id: this.$cookies.get("idcustomer")
      },
      categorie: [],
      product: [],
      heading: "facture RabhiConstruction",
      moreText: [
        "This is another few sentences of text to look at it.",
        
      ],
      items: [
        { title: "Item 1", body: "I am item 1 body text" },
        { title: "Item 2", body: "I am item 2 body text" },
        { title: "Item 3", body: "I am item 3 body text" },
        { title: "Item 4", body: "I am item 4 body text" }
      ]
    };
  },
  mounted() {

    this.getAll_categorie(),
      this.date_function(),
      this.name = this.$cookies.get("name"),
      this.email = this.$cookies.get("email"),
      this.tel = this.$cookies.get("tel")
    // this.metier = $this.cookies.get("metier")
  },
  methods: {
    generatePDF() {
      const columns = [
        { title: "Product", dataKey: "title" },
        { title: "Quantite", dataKey: "body" },
        { title: "Unité", dataKey: "body" },
        { title: "Prix Unitaire", dataKey: "body" }
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
          "RabhiConstruct.com",
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
      this.downloadf = res
      console.log(res)
      console.log(this.downloadf)

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
    passCmd() {

      // const customer_id = this.$cookies.get("idcustomer");
      // const fact_arr =[ customer_id];
      // const cmd_arr = [this.data.list];

      // console.log(fact_arr[0]);


      // console.log(cmd_arr[0]);
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
    download() {

      var doc = new jsPDF();
      doc.text("this.downloadf", 10, 10);
      doc.save("facture" + '.pdf');
    }
  },
};
</script>
