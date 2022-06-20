<template>
    <hello />
  <product/>
    <coop />
</template>

<script>
import hello from "@/components/test.vue";
import coop from "@/components/coop.vue";
import product from "../components/product.vue";

export default {
  components: {
    hello,
    coop,
    product
},
};
</script>
