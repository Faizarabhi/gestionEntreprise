import {createApp} from 'vue'
import VueCookies from 'vue-cookies';

import 'material-icons/iconfont/material-icons.css';
import App from './App.vue'
import router from './router'
// import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue"; // import lottie-vuejs
import './index.css'
import TawkMessengerVue from '@tawk.to/tawk-messenger-vue-3';
import 'flowbite';
import Vue3Lottie from "vue3-lottie";

const app = createApp(App)
app.use(VueCookies);
app.use(Vue3Lottie);
app.use(router)


// app.use(TawkMessengerVue, {
//     propertyId : '62a8668c7b967b11799474af',
//     widgetId : '1g5gt159a'
// });

app.mount('#app')

