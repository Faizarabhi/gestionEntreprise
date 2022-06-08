<template>
    

<div>
    
<div id="controls-carousel" class="relative" data-carousel="static">

<div class="overflow-hidden  relative h-48  sm:h-64 xl:h-80 2xl:h-80" style="height:32rem">

<div class="duration-700   ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10 " data-carousel-item="">
<img src="../assets/images/slide1.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
</div>

<div class="duration-700  ease-in-out absolute inset-0 transition-all transform translate-x-0 z-10" data-carousel-item="active">
<img src="../assets/images/slide2.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
</div>

<div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
<img src="../assets/images/slide3.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
</div>

</div>
<div class="relative ">
    <div class=" bg-bg-bleu w-[28rem] h-28 bg-opacity-75  absolute z-40 right-28 bottom-12 text-center pt-7 font-bold text-xl text-secondary">
    <h1>Feature Projects</h1>
    <p>The National University of Architecture</p></div>
<button type="button" class="  flex absolute bottom-7 right-80 z-30 justify-center items-center px-4 h-full cursor-pointer group" data-carousel-prev="">
<span class=" inline-flex justify-center items-center w-10 h-10  bg-secondary w-56    group-focus:outline-none">
<svg class="w-6 h-6 text-white  dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
<span class="text-white">Back</span>
</span>
</button>
<button type="button" class="flex absolute bottom-7 right-24 z-30 justify-center items-center px-4 h-full cursor-pointer group" data-carousel-next="">
<span class="border-l border-white inline-flex justify-center items-center w-10 h-10  bg-secondary w-56    group-focus:outline-none">
<span class="text-white">Next</span>
<svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
</span>
</button>
</div>
</div>
</div>
</template>