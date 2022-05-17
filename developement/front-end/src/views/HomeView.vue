<script>
import FirstPart from '../components/Home/FirstPart.vue'
import Produit from '../components/Home/Produit.vue'
import Servese from '../components/Home/Servese.vue'
import AboutUs from '../components/Home/AboutUs.vue'
import Contact from '../components/Home/Contact.vue'

export default {

  components: {
    FirstPart,
    Produit,
    Servese,
    AboutUs,
    Contact
  },
}
</script>

<template>
  <main>
    <FirstPart />
    <Produit />
    <Servese />
    <AboutUs />
    <Contact />
  </main>
</template>

<style lang="scss" scoped>
</style>
