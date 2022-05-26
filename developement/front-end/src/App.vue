<script>
import { RouterLink, RouterView } from 'vue-router'
import    NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';
import {  useCounterStore } from './stores/counter.js';

// useCounterStore ();

export default{
  components: {
    NavBar,
    Footer,
  }
}
</script>

<template>
  <NavBar />
  <RouterView />
  <Footer />
</template>


<style lang="scss">
    html{
      scroll-behavior: smooth;
    }
</style>
