<template>
    <navbar/>
    <ContactUsVue/>
    <footeer/>
    <coop/>
</template>



<style></style>

<script>
import navbar from '@/components/test.vue';
import footeer from '@/components/test2.vue';
import coop from '@/components/coop.vue';

import ContactUsVue from '../components/ContactUs.vue';



export default {
  components: {
    navbar,
    footeer,
    coop,
   
    ContactUsVue

},
};
</script>