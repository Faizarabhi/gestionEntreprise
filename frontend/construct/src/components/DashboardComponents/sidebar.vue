<template>
    <div >
        <div  class="relative" id="resize" :class=" isShow ? 'w-56 h-screen bg-dash-bleu p-4 ': 'w-20 h-screen bg-dash-bleu ' ">
            <div class="absolute  right-0 top-4 z-50  rotate-90 "   v-on:click="show">
                <i class="fa-solid fa-circle-chevron-down "   style="color:#F8F9FF !important; "></i>
            </div>
        <a href="/">
        <img src="../../assets/images/logo1.svg" :class=" isShow? ' p-4 pt-16 w-36' : 'p-4 pt-16'" alt="Flowbite Logo">
        </a>  
        <ul>
            <li class="p-8"><i class="fa-solid fa-chart-line"  style="color:#F8F9FF !important; "></i> <span v-if="isShow"> Analytic </span></li>
            <li class="p-8"><i class="fa-solid fa-magnifying-glass" style="color:#F8F9FF !important; "></i><span v-if="isShow"> Analytic </span></li>
            
        </ul> 
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            isShow : true
        }
    },
      methods: {
        show : function(){
          this.isShow =!this.isShow
          
        //   alert("mal7bek!")

        }
  }}

</script>