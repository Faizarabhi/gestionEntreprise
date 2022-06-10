<template>
  <div class="flex  flex-col">
    <div class="flex w-full h-16 items-center justify-end px-8 shadow">
      <div class="flex w-44 justify-between items-center">
        <div>
          <a
              class="cursor-pointer text-dash-bleu p-2.5 rounded"
              v-on:click="removeCookie"
          ><i class="fa-solid fa-right-from-bracket"></i
          ></a>
        </div>

        {{ name }}
        <div class="avatar">
          <div
              class="avatar w-8 rounded-full ring ring-dash-bleu ring-offset-base-100 ring-offset-2"
          >
            <img :src="getImgUrl(photo)"/>
          </div>
        </div>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script>
import {getCloudinaryImgUrl} from "../../utils/helpers";

export default {
  data() {
    return {
      name: "",
      photo: ""
    };
  },
  mounted() {
    this.name = this.$cookies.get("name");
    this.photo = this.$cookies.get("photo");
  },
  methods: {
    getImgUrl: getCloudinaryImgUrl,
    removeCookie: function (e) {
      this.$cookies.remove("idcustomer");
      this.$cookies.remove("email");
      this.$cookies.remove("name");
      this.$router.push("/login");
    },
  },
};
</script>
