<template>
    <div >
        <div  class="relative  " :class=" isShow ? 'w-56 h-screen bg-dash-bleu p-x-4 ': 'w-12 h-screen ml-0 bg-dash-bleu ' ">
            <div class="absolute top-12 -right-4    rotate-90 cursor-row-resize bg-bg-bleu rounded-full text-white  text-5xl" :class="isShow? 'z-50':'-rotate-90 z-50'"   v-on:click="show">
                <i class="fa-solid fa-circle-chevron-down "   ></i>
                
                
            </div>
        <a href="/">
        <img src="../../assets/images/logo1.svg" :class=" isShow? ' p-4 pt-16 w-36' : 'p-4 pt-16'" alt="logo ">
        </a>  
        <div class="menu-items flex flex-col ">
            <router-link to ="/profile" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"> <i class="fa-solid fa-user-tag" ></i> </span> <span v-if="isShow" class="" > User  </span></div></router-link>
            <router-link to ="/orders" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"><i class="fa-solid fa-truck-ramp-box" ></i></span>  <span v-if="isShow" class="" > Commande  </span></div></router-link>
            <router-link to ="/product" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"><span class="pr-4"> <i class="fa-solid fa-chart-line"  ></i></span> <span v-if="isShow" class="" > Product </span></div></router-link>
            <router-link to ="/historique" class="side-btn " :active-class="isShow? 'active text-bg-bg-bleu' : 'active1'" tag="button"> <div :class="isShow ? 'link-container  pl-16':'pl-4 '"> <span class="pr-4"><i class="fa-solid fa-chart-line"  ></i></span> <span v-if="isShow" class="" > statistic </span></div></router-link>
            
            
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
    color: white;
    background-color: transparent;
}
.side-btn:focus {
    outline: none;
}
.side-btn.active {
    position: relative;
    background-color: #E0E0FF;
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
    background-color: #E0E0FF;
}
.side-btn.active1 {
    position: relative;
    background-color: #E0E0FF;
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