<script setup>
import NavBar from './components/NavBar.vue';
// import NavAdmin from './components/NavAdmin.vue';
import Footer from './components/Footer.vue';
import Panier from './components/Panier.vue';
import { useStore } from '@/stores/counter';


const store = useStore();


</script>

<template>
  <NavBar />
  <NavAdmin />
  <Panier v-if="store.Panier" />
  <Router-View />
  <Footer />
</template>


<style lang="scss">
    html{
      scroll-behavior: smooth;
    }
</style>
