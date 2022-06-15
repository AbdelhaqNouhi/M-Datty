<script setup>
// import NavBar from './components/NavBar.vue';
import Cookies from 'js-cookie';
// import NavAdmin from './components/NavAdmin.vue';
// import Footer from './components/Footer.vue';
import Panier from './components/Panier.vue';
import { useStore } from '@/stores/counter';
import { RouterView } from 'vue-router';

const store = useStore();



</script>

<template>
  <!-- <NavBar /> -->
  <!-- <NavAdmin /> -->
  <Panier v-if="store.Panier" />
  <Router-View />
  <!-- <Footer /> -->
</template>



<style lang="scss">
    html{
      scroll-behavior: smooth;
    }
</style>
