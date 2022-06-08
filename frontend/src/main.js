import {createApp} from 'vue'
import VueCookies from 'vue-cookies';


import 'material-icons/iconfont/material-icons.css';
import App from './App.vue'
import router from './router'
// import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue"; // import lottie-vuejs
import './index.css'
import 'flowbite';
import Vue3Lottie from "vue3-lottie";

const app = createApp(App)


app.use(VueCookies);
app.use(Vue3Lottie);
app.use(router)
app.mount('#app')

