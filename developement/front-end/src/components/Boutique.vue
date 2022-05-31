<script>
export default{
  name: "Boutique",

  data () {
    return {
      Box: [],
    }
  },
  methods: {
    async GetBoutique () {
      const res = await fetch ('http://localhost:8000/api/GetProduct', {
        method: 'GET',
      });
      const data = await res.json()
      if(data){
        this.Box = data;
        console.log(this.Box);
      } else {
        console.log('error');
      }
    }
  },

  mounted () {
    this.GetBoutique ();
  }
}
</script>

<template>
<div class="parent">
  <div class="produits">
      <div v-for="box in Box" class="produit">
        <div class="image">
          <Router-Link to="/ProductItems"><img :src="`http://localhost:8000/uploads/` + box.image" alt="" style="width: 100%" /></Router-Link>
          <!-- <div class="top-right">
            <button>Nouveauté</button>
          </div> -->
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>{{box.name}}</p>
            </div>
            <div class="bb">
              <img src="../assets/images/shopping-cart-svgrepo-com (1).svg" alt="">
            </div>
          </div>
          <div>
            <h1>{{box.price}}</h1>
          </div>
        </div>
      </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.parent{
    padding: 5rem 0;
    display: flex;
    flex-direction: column;
}
.produits {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 2rem;
  gap: 2rem;
  margin: 0 1rem;


  @include tablet {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
  }

  @include desktop {
  margin: 1rem 8rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
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
  padding: 1rem;
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
