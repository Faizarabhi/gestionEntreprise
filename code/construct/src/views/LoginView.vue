<template>
  <hello />
  <div class="flex p-6 bg-gray-50">
    <div class="h-full h-full p-36">
      <img src="../assets/images/slide1.jpg" class="w-96" alt="" />
    </div>
    <div class="h-full h-full p-36 ">
      <div class="" >
            
<label  class="block mb-2 text-3xl font-bold text-gray-900 ">Votre espace client <span class="font-medium text-sm">Rabhi Construction</span></label>
<div class="relative">
<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
</div>
<input type="text" id="email-address-icon" class=" w-96 mt-8 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="name@flowbite.com">
</div>


<input type="text"  class=" border border-gray-300 w-96 mt-8 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Mot de passe">
<input type="text" class="border border-gray-300 w-96 mt-8 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  bg-white" placeholder="Code verification">
<div class="mt-3">
<a href="#" class="text-sm font-medium ">Mot de passe oublié?</a>
</div>
<div>
    <button class="bg-black text-white px-32 rounded mt-8 font-medium  py-2">Me connecter</button>
</div>

      </div>
    </div>
  </div>
  <coop />
</template>

<script>
import hello from "@/components/test.vue";
import coop from "@/components/coop.vue";

export default {
  components: {
    hello,
    coop,
  },
};
</script>
