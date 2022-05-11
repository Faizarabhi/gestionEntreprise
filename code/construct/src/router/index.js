import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import SigneupView from '../views/SigneupView.vue'
import DashboardView from '../views/DashboardView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path : '/signup',
      name : 'signup',
      component: SigneupView
      
    },
    {
      path : '/admin',
      name : 'admin',
      component: DashboardView
      
    }

    
    
  ]
})

export default router
