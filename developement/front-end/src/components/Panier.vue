<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useStore } from '@/stores/counter'

const store = useStore()
const showPanier = store.showPanier;
const id = store.user.user_id;
const e = store.count;


const Box = ref([]);

const GetBasket = async function () {
  const res = await axios.get('http://localhost/api/GetBasket?id=' + id);
  const data = await res.data;
  if (data) {
    e(data);
    Box.value = data;
  } else {
    console.log("error");
  }
}

const DeletePanier = async function (id) {
  console.log(id);
  const res = await axios.post('http://localhost/api/DeleteBasket', { id: id });
  const data = await res.data;
  if (data) {
    console.log(data);
  } else {
    console.log("error");
  }
}

onMounted (() => {
  GetBasket();
});


</script>
<template>

<div class="containerPanier">
<div class="parent">
  <div class="panier">
      <div class="title">
        <svg  @click="showPanier" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.<path d="M9.375 233.4l128-128c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H480c17.69 0 32 14.31 32 32s-14.31 32-32 32H109.3l73.38 73.38c12.5 12.5 12.5 32.75 0 45.25c-12.49 12.49-32.74 12.51-45.25 0l-128-128C-3.125 266.1-3.125 245.9 9.375 233.4z"/></svg>
        <h1>Panier</h1>
      </div>
        <p v-if="!id">Pour le panier Vous devez étre connect?</p>
      <div v-for="box in Box" class="product">
        <div class="product_img">
          <img :src="`http://localhost/uploads/` + box.image" alt="" />
        </div>
        <div class="product_info">
          <div class="name">
            <p>{{box.name}}</p>
          </div>
          <div class="count">
            <button>-</button>
            <button>+</button>
          </div>
        </div>
        <div class="price">
          <p>{{box.price }}</p>
        </div>
        <div @click="DeletePanier(box.product_id)" class="close">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
        </div>
      </div>
  </div>
</div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";


.containerPanier{
  width: 100%;
  height: auto;
  display: flex;
  justify-content: end;
}

.parent {
  border-radius: 0.3rem;
  display: flex;
  justify-content: center;
  position: absolute;
  z-index: 1;
  width: 100%;
  background: white;

  @include  tablet {
    width: 60%;
  }

  @include  lg-desktop {
    width: 40%;
  }
}

.panier {
  width: 100%;
  margin-left: auto;
  padding: 1rem;
  background-color: $secondary-bg-color;


  @include tablet {
    width: 100%;
  }

  @include desktop {
    width: 100%;
  }

  // :
  .title {
    padding: 0rem 1rem 1rem 1rem;
    width: 100%;
    display: flex;
    justify-content: space-between;

    svg {
      width: 1.5rem;
    }
     h1 {
      font-size: 1.5rem;
     }
  }

  .product {
    color: black;
    padding: 0.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    // background-color: $button_color;
    // border-bottom: 1px solid black;
    box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.5);
    border-radius: 0.5rem;
    margin: 1rem 0;

    .product_img {

      img {
        border-radius: 0.2rem;
        height: 5rem;
      }

    }

    .product_info {
      margin-top: auto;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      // margin: auto;
    }

    .count {
      display: flex;
      gap: 5px;

      button {
        text-align: center;
        align-items: center;
        width: 1.5rem;
        border: none;
        background-color: $button_color;
        border-radius: 0.3rem;
      }

    }

    .close {
      margin-left: auto;
      margin-bottom: auto;

      svg {
        width: 1.4rem;
        height: 1.4rem;
        cursor: pointer;
      }
    }

    .price {
      font-weight: bold;
      font-size: 12px;
      padding: 2px;
      width: 4rem;
      text-align: center;
      margin-top: auto;
      background-color: $button_color;
      border-radius: 0.3rem;
    }

  }
}
</style>