<template>
    <hello />
  <Signup/>
    <coop />
</template>

<script>
import hello from "@/components/test.vue";
import coop from "@/components/coop.vue";
import Signup from "../components/signup.vue";

export default {
  components: {
    hello,
    coop,
    Signup
},
};
</script>
