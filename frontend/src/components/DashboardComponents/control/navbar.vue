<template>
  <div class="flex w-full  h-16  items-center justify-evenly shadow">
    
<div class="w-[65%]"> </div>

    <div class="flex w-32 items-center ">
      <div>
        <a class="cursor-pointer text-dash-bleu p-2.5 rounded" v-on:click="removeCookie"><i
            class="fa-solid fa-right-from-bracket"></i>
        </a>
      </div>
      <div class="avatar ml-auto">
        <div class="avatar w-8 rounded-full ring ring-dash-bleu ring-offset-base-100  ring-offset-2">
          <img :src="getImgUrl(photo)" />
        </div>
      </div>

      
    </div>

  </div>
</template>
<script>
import { getCloudinaryImgUrl } from "../../../utils/helpers";

export default {
  data() {
    return {
      photo: "",
      name: "",

      search: "",
    };
  },
  props: {
    isShow: Boolean,
    show: Function,
  },
  mounted() {
    this.name = this.$cookies.get("name");
    this.photo = this.$cookies.get("photo");

  },
  methods: {
    searchit: function (e) {
      console.log(this.search);
    },
    removeCookie: function (e) {
      // it sets the cookie called `username`
      //  console.log('taha remove');
      this.$cookies.remove("idadmin");
      this.$cookies.remove("email");
      this.$router.push("/login");
    },
    getImgUrl: getCloudinaryImgUrl,
  },
};
</script>
