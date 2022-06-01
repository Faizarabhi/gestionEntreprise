<template>
    <div >
        <div  class="relative  " :class=" isShow ? 'w-56 h-screen bg-dash-bleu p-x-4 ': 'w-16 h-screen  bg-dash-bleu ' ">
            <div class="absolute top-20 -right-4    rotate-90 cursor-row-resize bg-bg-bleu rounded-full text-primary  text-5xl" :class="isShow? 'z-50 ':'-rotate-90  z-50'"   v-on:click="show">
                <i class="fa-solid fa-circle-chevron-down "   ></i>
                
                
            </div>
        <a href="/">
        <img src="../../assets/images/logo.svg" :class=" isShow? ' p-20 pt-16 ' : 'pt-4 '" alt="logo ">
        </a>  
        <div class="menu-items flex flex-col mt-12">
            <!-- <router-link to ="/profile" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"> <i class="fa-solid fa-user-helmet-safety"  style="color:#FFAA4C   !important;" ></i></span> <span v-if="isShow" class="" > Personnel  </span></div></router-link> -->
            <router-link to ="/profile" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"> <i class="fa-solid fa-person-digging"  style="color:#FFAA4C   !important;" ></i></span> <span v-if="isShow" class="" > Personnel  </span></div></router-link>
            <router-link to ="/orders" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"><i class="fa-solid fa-cart-flatbed-boxes" style="color:#FFAA4C   !important;"></i></span>  <span v-if="isShow" class="" > Order </span></div></router-link>
            <!-- <router-link to ="/orders" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"><i class="fa-solid fa-forklift" style="color:#FFAA4C   !important;"></i></span>  <span v-if="isShow" class="" > Order </span></div></router-link> -->
            <router-link to ="/product" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"><span class="pr-4"> <i class="fa-solid fa-chart-line"  style="color:#FFAA4C   !important;"></i></span> <span v-if="isShow" class="" > Product </span></div></router-link>
            <router-link to ="/historique" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"><i class="fa-solid fa-chart-line"  style="color:#FFAA4C   !important;"></i></span> <span v-if="isShow" class="" > statistic </span></div></router-link>
            
            
        </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        isShow:Boolean,
        show: Function,
    },

        }

</script>

<style scoped>

.menu-items {
    display: flex;
    flex-direction: column;
    /* margin-top: 40px; */
    margin-left: 6px;
}
.menu-items > * {
    margin-top: 40px;
}
.side-btn {
    border: none;
    padding: 16px 0px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: #f9F9F9;
    background-color: transparent;
}
.side-btn:focus {
    outline: none;
}
.side-btn.active {
    position: relative;
    background-color: #f9F9F9;
    color :#001E6C;
    font-weight: 600;
    margin-left: 10px;
    border-radius: 30px 0 0 30px;
}
.side-btn.active::before {
    top: -30px;
}
.side-btn.active::after {
    bottom: -30px;
}
.side-btn.active::before, .side-btn.active::after {
    position: absolute;
    content: "";
    right: 0;
    height: 30px;
    width: 30px;
    background-color: #F9F9F9;
}
.side-btn.active1 {
    position: relative;
    background-color: #F9F9F9;
    color : #001E6C;
    font-weight: 600;
    
    border-radius: 30px 0 0 30px;
}
.side-btn.active1::before {
    top: -30px;
}
.side-btn.active1::after {
    bottom: -30px;
}
.side-btn.active1::before, .side-btn.active1::after {
    position: absolute;
    content: "";
    right: 0;
    height: 30px;
    width: 30px;
    
    background-color: #e7000000;
}



.side-btn.active .link-container::before {
    top: -60px;
}
.side-btn.active .link-container::after {
    bottom: -60px;
    z-index: 99;
}

.side-btn.active .link-container::before, .side-btn.active .link-container::after {
    position: absolute;
    content: "";
    right: 0px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background-color: #001E6C;
}.side-btn.active .link-container::before {
    top: -60px;
}
.side-btn.active .link-container::after {
    bottom: -60px;
    z-index: 99;
}

.side-btn.active .link-container::before, .side-btn.active .link-container::after {
    position: absolute;
    content: "";
    right: 0px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background-color: #001E6C;
}
</style>