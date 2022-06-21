import { createRouter, createWebHistory } from "vue-router";
import HomeView from '../views/HomeView.vue'
import Boutique from '../components/Boutique.vue'
import Contact from '../components/Home/Contact.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import PageUser from '../components/PageUser.vue'
import PageAdmin from '../components/admin/PageAdmin.vue'
import AdminCommand from '../components/admin/AdminCommand.vue'
import LoginAdmin from '../components/admin/LoginAdmin.vue'
import ProductItems from '../components/ProductItems.vue'
import AboutUs from '../components/Home/AboutUs.vue'
import Panier from '../components/Panier.vue'
import Command from '../components/Command.vue'
import { useStore } from '@/stores/counter';


const store = useStore();

const user = store.user;
const admin = store.admin;
const routes= [
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
    path: '/AboutUs',
    name: 'AboutUs',
    component: AboutUs,
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
  },

  {
    path: '/PageUser',
    name: 'PageUser',
    component: PageUser,
  },

  {
    path: '/LoginAdmin',
    name: 'LoginAdmin',
    component: LoginAdmin,
  },

  {
    path: '/PageAdmin',
    name: 'PageAdmin',
    component: PageAdmin,
  },

  {
    path: '/AdminCommand',
    name: 'AdminCommand',
    component: AdminCommand,
  },

  {
    path: '/ProductItems/:id',
    name: 'ProductItems',
    component: ProductItems,
  },

  {
    path: '/Panier',
    name: 'Panier',
    component: Panier,
  },

  {
    path: '/Command',
    name: 'Command',
    component: Command,
  },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});


router.beforeEach((to,from ,next) => {
  if (to.name == "Home" || to.name=="regi") {
    next();
  } else {
    if (user || admin) {
      next();
    } else {
      next("/");
    }
  }
})

export default router;
