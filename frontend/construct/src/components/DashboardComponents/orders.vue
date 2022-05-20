<template>
  <div class="bg-bg-bleu z-0 absolute pt-20 pl-60 h-screen w-screen">
    <div
      class="relative overflow-x-auto p-8 sm:rounded-lg bottom-5 max-h-full h-full overflow-y-scroll scrollbar-thin scrollbar-thumb-dash-bleu scrollbar-track-scroll-bleu scrollbar-thumb-rounded-full scrollbar-track-rounded-full"
    >
    
    <div class="overflow-x-auto">
  <table class="table table-compact w-full">
    <thead>
      <tr>
        <th></th> 
        <th>Name</th> 
        <th>Job</th> 
        <th>company</th> 
        <th>location</th> 
        <th>Last Login</th> 
        <th>Favorite Color</th>
      </tr>
    </thead> 
    <tbody>
      <tr v-for=" index in 1000" :key="index">
        <th>1</th> 
        <td>Cy Ganderton</td> 
        <td>Quality Control Specialist</td> 
        <td>Littel, Schaden and Vandervort</td> 
        <td>Canada</td> 
        <td>12/16/2020</td> 
        <td>Blue</td>
      </tr>
     </tbody></table></div>
    
    </div>
  </div>
</template>
