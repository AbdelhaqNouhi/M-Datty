<script setup>
import NavBar from '../components/NavBar.vue'
import FirstPart from '../components/Home/FirstPart.vue'
import Produit from '../components/Home/Produit.vue'
import Servese from '../components/Home/Servese.vue'
import AboutUs from '../components/Home/AboutUs.vue'
import Contact from '../components/Home/Contact.vue'
import Footer from '../components/Footer.vue'

</script>

<template>
<NavBar />
  <main id="body">
    <FirstPart />
    <Produit />
    <Servese />
    <AboutUs />
    <Contact id="Contact" />
  </main>
  <Footer />
</template>

<style lang="scss" scoped>

</style>
