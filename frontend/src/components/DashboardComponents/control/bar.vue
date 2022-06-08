<template>
  <div class="flex ">
    <sidebar :isShow="isShow" :show="show" />
    <div class=" bg-bg-bleu     flex flex-col items-center w-full">
      <navbar :isShow="isShow" :show="show" />
      <router-view />
    </div>
  </div>
</template>
<script>
import sidebar from "./sidebar.vue";
import navbar from "./navbar.vue";
import st from "../personnel/profile.vue";

export default {
  components: {
    sidebar,
    navbar,
    st,
  },
  data() {
    return {
      isShow: true,
    };
  },
  methods: {
    show: function () {
      this.isShow = !this.isShow;
    },
  },
};
</script>
