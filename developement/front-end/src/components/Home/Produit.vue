<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';
import { RouterView, useRoute } from 'vue-router';
import router from '../../router';

const store = useStore();
const user = store.user;

const Box = ref([]);

const GetThreProduct = async function () {
    const res = await axios.get('http://localhost/api/ThreProduct');
    const data = await res.data;
    
    if (data) {
        Box.value = data;
    } else {
        console.log("error");
    }
}

const ckeck = async function (data) {
  if(!user) {
    router.push('/login');
    alert("please go to Login");
  }
  else {
    takeId(data);
  }
}

const takeId = async function (data) {
    
    data.user_id = store.user.user_id;   
    await axios.post('http://localhost/api/AddBasket', data)
    .then(function (response) {
        if(response.data.message === "Basket added successfully") {
            store.count(parseInt(store.counter) + 1);
            alert("produit ajoute a votre panier");
            GetThreProduct();
        }
        else {
            alert("Produit déjà trouvé dans votre panier");
        }
    })
}


onMounted (() => {
    GetThreProduct();
});


</script>

<template>
<div class="parent">
  <div class="produits">
      <div v-for="box in Box" class="produit">
        <div class="image">
          <Router-Link :to="{ name: 'ProductItems', params: { id: box.product_id }}" ><img :src="`http://localhost/uploads/` + box.image" alt="" /></Router-Link>
          <div class="top-right">
            <button>Nouveauté</button>
          </div>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>{{box.name}}</p>
            </div>
            <div @click="ckeck(box)" class="card">
                <img src="../../assets/images/icone/shopping-cart-svgrepo.svg" alt="">
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
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";

.parent{
    display: flex;
    flex-direction: column;
}
.produits {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 2rem;
    gap: 2rem;
    margin: 7rem 1rem;


  @include tablet {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
  }

  @include desktop {
  margin: 2rem 8rem auto;
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
  position: relative;
  text-align: center;
  color: white;
  border-radius: 0.3rem;

    img {
        width: 100%;
        height: 60vh;

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
  background-color: $secondary-bg-color;
  padding: 1rem;
  border-radius: 0.3rem;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);


  h1{
    padding: 1rem 0 0 0;
    font-size: 16px;
    font-weight: bold;
  }
  .a{
    display: flex;
    align-items: center;

    .card {
      width: 2rem;
      margin-left: auto;
      border: none;

      img {
        width: 100%;
        height: 100%;
        background-color: $secondary-bg-color;
      }
    }
  }
}
</style>