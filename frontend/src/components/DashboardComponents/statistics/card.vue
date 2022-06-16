<template>

<div class="stats shadow-xl my-8">
  
  <div class="stat">
    <div class="stat-figure text-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    </div>
    <div class="stat-title text-primary">New Command</div>
    <div class="stat-value text-secondary">{{numberfacture}}1K</div>
    <div class="stat-desc"> {{today}}</div>
  </div>
  
  <div class="stat">
    <div class="stat-figure text-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
    </div>
    <div class="stat-title text-primary">New Customers</div>
    <div class="stat-value text-secondary   ">{{numbercustomer}}1 Customers</div>
    <div class="stat-desc">↗︎ 400 (22%)</div>
  </div>
  
  <div class="stat">
    <div class="stat-figure text-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
    </div>
    <div class="stat-title text-primary">New Registers</div>
    <div class="stat-value text-secondary">1,200</div>
    <div class="stat-desc">↘︎ 90 (14%)</div>
  </div>
  
</div>

</template>


<script>
import axios from "axios";
let today ;
export default{
  data() {
    return {
      numbercustomer : "",
      numberfacture : ""
    }
  },
  mounted() {
    this.getNumberCustomers();
    this.getNumberFacture();
    this.today = new Date();
    console.log("Card");
  },
  methods:{
getNumberCustomers() {

        axios.get('http://localhost/filrouge/backend/CustomerController/get_customerDate')
            .then(res => {
              this.numbercustomer = res.data[0].aa
              console.log(this.numbercustomer)


            })
      },getNumberFacture() {

        axios.get('http://localhost/filrouge/backend/FactureController/getfactures')
            .then(res => {
              this.numberfacture = res.data[0].Num
              console.log(this.numberfacture)


            })
      },
      }
}
</script>