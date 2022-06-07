<script>
import { useStore } from './stores/counter';
import    NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';

// useStore();

export default{
  name: 'App',
  
  components: {
    NavBar,
    Footer,
  }
}
</script>

<template>
  <NavBar />
  <Router-View />
  <Footer />
</template>


<style lang="scss">
    html{
      scroll-behavior: smooth;
    }
</style>
