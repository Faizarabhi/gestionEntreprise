<template>
  <hello />
  <Signin/>
  <coop />
</template>

<script>
import hello from "@/components/test.vue";
import coop from "@/components/coop.vue";
import Signin from "../components/signin.vue";

export default {
  components: {
    hello,
    coop,
    Signin
},
};
</script>
