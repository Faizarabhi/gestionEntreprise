<template>
    <hello/>
    <Slide/>
    <Slide1/> 
    <Aboute/>
    <Services/>
    <Slideexp/>
    <call/>
    <Product/>
    <maps/>
    <fotr/>
    <coop/>
</template>



<style></style>

<script>
import hello from '@/components/test.vue';
import fotr from '@/components/test2.vue';
import coop from '@/components/coop.vue';
import Slide1 from '@/components/slide1.vue';
import Aboute from '@/components/slideAboute.vue';
import Slide from '@/components/slide.vue';
import Services from '@/components/Services.vue';
import Slideexp from '@/components/slideexp.vue';
import call from '@/components/call.vue';
import Product from '@/components/product.vue';
import Opinion from '@/components/Opinion.vue';
import maps from '@/components/maps.vue'




export default {
  components: {
    hello,
    fotr,
    coop,
    Slide1,
    Aboute,
    Slide,
    Services,
    Slideexp,
    call,
    Product,
    Opinion,maps
},
};
</script>