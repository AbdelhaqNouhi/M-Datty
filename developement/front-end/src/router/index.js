import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Boutique from '../components/Boutique.vue'
import Contact from '../components/Home/Contact.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView,
    },

    {
      path: '/Boutique',
      name: 'Boutique',
      component: Boutique,
    },

    {
      path: '/Contact',
      name: 'Contact',
      component: Contact,
    },

    {
      path: '/Login',
      name: 'Login',
      component: Login,
    },

    {
      path: '/Register',
      name: 'Register',
      component: Register,
    }
  ]
});

export default router
