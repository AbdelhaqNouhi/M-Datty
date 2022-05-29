<script>
import    NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';

export default{
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
