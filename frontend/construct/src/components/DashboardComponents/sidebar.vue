<template>
    <div >
        <div  class="relative fixed z-40 " :class=" isShow ? 'w-56 h-screen bg-dash-bleu p-x-4 ': 'w-2/4 h-screen bg-dash-bleu ' ">
            <div class="absolute top-20 -right-4 top-4 z-50 border-2 border-zinc-500 rounded-full   rotate-90 cursor-row-resize  sidebar text-5xl"   v-on:click="show">
                <i class="fa-solid fa-circle-chevron-down "   style="color:#F8F9FF !important; "></i>
                
            </div>
        <a href="/">
        <img src="../../assets/images/logo1.svg" :class=" isShow? ' p-4 pt-36 w-36' : 'p-4 pt-36'" alt="logo ">
        </a>  
        <div class="menu-items flex flex-col ">
            <router-link to ="/profile" class="side-btn " :active-class="isShow? 'active' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <i class="fa-solid fa-user-tag" style="color:black !important; "></i>  <span v-if="isShow" class="" > user  </span></div></router-link>
            <router-link to ="/orders" class="side-btn " :active-class="isShow? 'active' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <i class="fa-solid fa-truck-ramp-box" style="color:black !important; "></i>  <span v-if="isShow" class="" > cmd  </span></div></router-link>
            <router-link to ="/product" class="side-btn " :active-class="isShow? 'active' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <i class="fa-solid fa-chart-line"  style="color:black !important; "></i> <span v-if="isShow" class="" > Product </span></div></router-link>
            <router-link to ="/historique" class="side-btn " :active-class="isShow? 'active' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <i class="fa-solid fa-chart-line"  style="color:black !important; "></i> <span v-if="isShow" class="" > statistic </span></div></router-link>
            
            
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
    margin-top: 40px;
    margin-left: 6px;
}
.menu-items > * {
    margin-top: 60px;
}
.side-btn {
    border: none;
    padding: 16px 0px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: white;
    background-color: transparent;
}
.side-btn:focus {
    outline: none;
}
.side-btn.active {
    position: relative;
    background-color: #ffffff60;
    color : #081A51;
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
    background-color: #ffffff60;
}
.side-btn.active1 {
    position: relative;
    background-color: #ffffff60;
    color : #081A51;
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
    background-color: #081A51;
}
</style>