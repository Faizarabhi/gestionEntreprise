import { createApp } from 'vue'
import VueCookies from 'vue-cookies';
import App from './App.vue'
import router from './router'
import './index.css'
import 'flowbite';
const app = createApp(App)


app.use(VueCookies);
app.use(router)
app.mount('#app')

