<template>

    <div class="absolute flex items-center bg-bg-bleu z-30" :class=" isShow ? 'shadow w-full h-16  z-40 pl-56 ' : 'shadow w-full h-16 z-40  pl-32  '">
        <img src="../../assets/images/about.svg" class="w-20 h-20 ml-12 rounded-full">
        <div class="flex flex-col border-r-2  border-gray-400  px-12">
        <h1>hello</h1>
        <p>hello</p>
        </div>
        <div class="p-4 flex items-center">
        <i class="fa-solid fa-magnifying-glass" style="color:gray !important"> </i>
        <input type="text" placeholder="Search ..." class="border-0 bg-transparent ">
        </div>
        <div class=" pl-8 border-l-2  ml-64 border-gray-400 ">
            <span class="flex h-3 w-3">
        <span class="animate-ping absolute inline-flex h-4 w-4 rounded-full bg-red-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"><i class="fa-regular fa-bell"></i></span>
</span>
        
        </div>
    </div>


</template>
<script>

export default{
    props:{
        isShow:Boolean,
        show: Function,
    },
    
}
</script>