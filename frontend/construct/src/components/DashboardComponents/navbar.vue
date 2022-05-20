<template>

    <div class="absolute flex items-center bg-bg-bleu z-30" :class=" isShow ? 'shadow w-full h-16  z-40 pl-56 ' : 'shadow w-full h-16 z-40  pl-32  '">
        
        
        <img src="../../assets/images/about.svg" class="w-20 h-20 ml-12 rounded-full">
        <div class="flex flex-col border-r-2  border-gray-400  px-12">
        <h1 class="font-bold">{{name}} </h1>
        <p>hello</p>
        
        </div>
        <div class="p-4 flex items-center">
        <i class="fa-solid fa-magnifying-glass" style="color:gray !important"> </i>
        <input type="text" v-model="search" placeholder="Search ..." class="border-0 bg-transparent ">

        </div>
        <div class=" pl-8 border-l-2  ml-64 border-gray-400 ">
            <span class="flex h-3 w-3">
        <span class="animate-ping absolute inline-flex h-4 w-4 rounded-full bg-red-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"><i class="fa-regular fa-bell"></i></span>
</span>
             <a class="cursor-pointer  bg-dash-bleu text-white p-2.5 ml-24 mb-20 rounded" v-on:click="removeCookie">Log Out</a>
        </div>
    </div>


</template>
<script>
    
export default{
    data() {
        return {
            name : "",
            search:""
        }
    },
    props:{
        isShow:Boolean,
        show: Function,
    },
    mounted(){
        this.name = this.$cookies.get("name");
        
    },
    methods: {
        search: function(e){
            console.log(this.search)
        },
        removeCookie : function(e){
         // it sets the cookie called `username`
        //  console.log('taha remove');
       this.$cookies.remove("idadmin");  
       this.$cookies.remove("email");  
  this.$router.push('/')  
        }
    },
}
</script>