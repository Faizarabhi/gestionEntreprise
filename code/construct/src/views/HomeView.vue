<template>
    <hello/>
    <Slide/>
    <Slide1/> 
    <Aboute/>
    <Services/>
    <Slideexp/>
    <fotr/>
    <coop/>
</template>



<style></style>

<script>
import hello from '@/components/test.vue';
import fotr from '@/components/test2.vue';
import coop from '@/components/coop.vue';
import Slide1 from '../components/slide1.vue';
import Aboute from '../components/slideAboute.vue';
import Slide from '../components/slide.vue';
import Services from '../components/Services.vue';
import Slideexp from '../components/slideexp.vue';



export default {
  components: {
    hello,
    fotr,
    coop,
    Slide1,
    Aboute,
    Slide,
    Services,
    Slideexp
},
};
</script>