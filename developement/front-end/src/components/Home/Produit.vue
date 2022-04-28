<script>
export default {
  name: "Produit",
};
</script>

<template>
  <div class="produits">
    <div class="produit">
      <img
        src="../../assets/images/pexels-brett-jordan-9074993.jpg" alt="" style="width: 100%" />
      <div class="top-right">
        <button>Nouveauté</button>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
*{
    font-family: $fonts;
}
.produits {
    margin: 5rem;
}
.produit {
    position: relative;
    text-align: center;
    color: white;
    width: 20rem;
    height: 25rem;

    img {
        width: 100%;
        height: 100%;
        border-radius: 0.3rem;
    }
}
.top-right {
    position: absolute;
    top: 0px;
    right: 0px;

    button {
        color: #ffffff;
        font-size: 12px;
        background-color: $header-color;
        width: 5.5rem;
        height: 1.9rem;
        border: none;
        border-radius: 0.3rem;
    }
}
</style>
