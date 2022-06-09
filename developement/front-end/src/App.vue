<script setup>
import NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';
import Panier from './components/Panier.vue';
import { useStore } from '@/stores/counter';
import { VueCookies } from 'vue-cookies';


const store = useStore();

// localStorage.setItem('admin_id', '1');
// localStorage.removeItem('admin_id');

</script>

<template>
  <NavBar />
  <Panier v-if="store.Panier" />
  <Router-View />
  <Footer />
</template>


<style lang="scss">
    html{
      scroll-behavior: smooth;
    }
</style>
