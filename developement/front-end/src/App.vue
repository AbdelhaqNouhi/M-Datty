<script>
// import { RouterLink, RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'
import FirstPart from './components/Home/FirstPart.vue'
import Produit from './components/Home/Produit.vue'

export default{
  components: {
    NavBar,
    FirstPart,
    Produit,
  }
}
</script>

<template>
  <NavBar />
  <FirstPart />
  <Produit />
  <RouterView />
</template>

<style lang="scss" scoped>

</style>
