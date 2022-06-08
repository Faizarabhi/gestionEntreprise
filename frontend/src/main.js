import { createApp } from 'vue'
import VueCookies from 'vue-cookies';


import 'material-icons/iconfont/material-icons.css';
import App from './App.vue'
import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue"; // import lottie-vuejs
import router from './router'
import './index.css'
import 'flowbite';
import jsPDF from 'jsPDF'
const app = createApp(App)



app.use(VueCookies);
app.use(LottieAnimation);
app.use(router)
app.mount('#app')

