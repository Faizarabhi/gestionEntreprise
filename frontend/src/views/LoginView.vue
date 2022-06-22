<template>
  <navbar />
  <Signin/>
  <coop />
</template>

<script>
import navbar from "@/components/test.vue";
import coop from "@/components/coop.vue";
import Signin from "../components/signin.vue";

export default {
  components: {
    navbar,
    coop,
    Signin
},
};
</script>
