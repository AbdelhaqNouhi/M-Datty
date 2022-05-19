<script>
export default {
  name: "Produit",
};
</script>

<template>
  <div class="produits">
      <div class="produit">
        <div class="image">
          <img
            src="../../assets/images/pexels-brett-jordan-9074993.jpg" alt="" style="width: 100%" />
          <div class="top-right">
            <button>Nouveauté</button>
          </div>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>hhhhhhhhhhhhhhhhhhhhhhh</p>
            </div>
            <div class="bb">
              <img src="../../assets/images/shopping-cart-svgrepo-com (1).svg" alt="">
            </div>
          </div>
          <div>
            <h1>200$</h1>
          </div>
        </div>
      </div>

      <div class="produit">
        <div class="image">
          <img
            src="../../assets/images/pexels-brett-jordan-9074993.jpg" alt="" style="width: 100%" />
          <div class="top-right">
            <button>Nouveauté</button>
          </div>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>hhhhhhhhhhhhhhhhhhhhhhh</p>
            </div>
            <div class="bb">
              <img src="../../assets/images/shopping-cart-svgrepo-com (1).svg" alt="">
            </div>
          </div>
          <div>
            <h1>200$</h1>
          </div>
        </div>
      </div>

      <div class="produit">
        <div class="image">
          <img
            src="../../assets/images/pexels-brett-jordan-9074993.jpg" alt="" style="width: 100%" />
          <div class="top-right">
            <button>Nouveauté</button>
          </div>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>hhhhhhhhhhhhhhhhhhhhhhh</p>
            </div>
            <div class="bb">
              <img src="../../assets/images/shopping-cart-svgrepo-com (1).svg" alt="">
            </div>
          </div>
          <div>
            <h1>200$</h1>
          </div>
        </div>
      </div>
  </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";

.produits {
  display: flex;
  justify-content: center;
  flex-direction: column;
  gap: 2rem;
  margin: 0 1rem;

  @include tablet {
    display: flex;
    grid-gap: 8rem;
  }

  @include desktop {
  margin: 1rem 8rem;
  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 2rem;
  }
}
.produit {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  height: 33rem;

}
.image {
  width: 100%;
  height: 100%;
  position: relative;
  text-align: center;
  color: white;
  border-radius: 0.3rem;

    img {
        width: 100%;
        height: 100%;
        border-radius: 0.3rem;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
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
.description{
  height: 8rem;
  background-color: #E5E5E5;
  padding: 0.5rem;
  border-radius: 0.3rem;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);

  h1{
    padding: 1rem 0 0 0;
    font-size: 14px;
  }
  .a{
    display: flex;
    align-items: center;

    .bb {
      width: 2rem;
      margin-left: auto;
    }
  }
}
</style>
