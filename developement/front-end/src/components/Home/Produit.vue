<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';

const store = useStore();
const user = store.user.user_id;
console.log(user);

const Box = ref([]);

const GetThreProduct = async function () {
    const res = await axios.get('http://localhost:8000/api/ThreProduct');
    const data = await res.data;
    if (data) {
        Box.value = data;
    } else {
        console.log("error");
    }
}

const takeId = async function (data) {
  // const Data = data.push(user)
  console.log(data);
  const res = await axios.post('http://localhost:8000/api/AddBasket', data );
  const data2 = await res.data;
  if (data2) {
    console.log(data2);
  } else {
    console.log("error");
  }
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
          <Router-Link :to="{ name: 'ProductItems', params: { id: box.product_id }}" ><img :src="`http://localhost:8000/uploads/` + box.image" alt="" /></Router-Link>
          <div class="top-right">
            <button>Nouveauté</button>
          </div>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>{{box.name}}</p>
            </div>
            <div @click="takeId(box)" class="card">
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

    .card {
      width: 2rem;
      margin-left: auto;
      border: none;
      background-color: #E5E5E5;
    }
  }
}
</style>