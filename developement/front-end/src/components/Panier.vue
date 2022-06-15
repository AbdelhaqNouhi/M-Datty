<script setup>
import NavBar from '../components/NavBar.vue'
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useStore } from '@/stores/counter'

const store = useStore()
// const showPanier = store.showPanier;
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
<NavBar />
<div class="containerPanier">
<div class="parent">
  <div class="panier">
      <div class="title">
        <h1>Panier</h1>
      </div>
      <div v-for="box in Box" class="product">
        <div class="product_img">
          <img :src="`http://localhost/uploads/` + box.image" alt="" />
        </div>
        <div class="product_info">
          <div class="name">
            <p>{{box.name}}</p>
            <p>{{box.description}}</p>
          </div>
          <div class="counter">
            <div>
              <label>Quantité</label>
            </div>
            <div class="count">
              <button>-</button>
              <button>+</button>
            </div>
          </div>
          <div class="price">
            <label>Prix</label>
            <p>{{box.price }}</p>
          </div>
        </div>
          <div @click="DeletePanier(box.product_id)" class="close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
          </div>
      </div>
      <div class="total">
        <div class="text">
          <label>SOUS-TOTAL</label>
          <p>55555555555</p>
        </div>
        <div class="btn">
          <button>FINALISER LA COMMAND</button>
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
  justify-content: center;
}
.router-link-active {
  color: $button-color;
  border-bottom: none;
}
.parent {
  border-radius: 0.3rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  background: white;

  @include  tablet {
    width: 100%;
  }

  @include  lg-desktop {
    width: 70%;
  }
}

.panier {
  margin: 10rem 0;
  width: 100%;
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: $secondary-bg-color;

  // :
  .title {
    padding: 0.5rem;
     h1 {
      font-size: 1.5rem;
     }
  }

  .product {
    color: black;
    background-color: white;
    padding: 0.5rem;
    display: flex;
    align-items: center;
    gap: 3rem;
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
    border-radius: 0.5rem;
    margin: 1rem 0;

    .product_img {
      width: 20%;

      @include mobile {
        width: 30%;
      }
      @include tablet {
        width: 20%;
      }

      @include desktop {
        width: 15%;
      }

      // @include lg-desktop {
      //   width: 25%;
      // }
      img {
        border-radius: 0.2rem;
        width: 100%;
      }
    }
    label {
      font-size: 16px;
      font-weight: bold;
      display: none;

      @include desktop {
        display: block;
      }

      @include tablet {
        display: block;
      }
    }

    .product_info {
      display: flex;
      flex-direction: column;
      justify-content: Space-between;
      width: 50%;
      gap: 1rem;

      p {
        font-size: 14px;

        @include tablet {
          font-size: 16px;
        }
        @include desktop {
          margin-bottom: auto;
          font-size: 16px;

        }
      }
      @include tablet {
        width: 75%;
        flex-direction: row;
        gap: 4rem;
      }
      @include desktop {
        display: flex;
        flex-direction: row;
        gap: 6rem;
      }
    }

    .counter {
      margin-right: auto;
      display: flex;
      flex-direction: column;
      
      @include tablet {
        display: flex;
        gap: 2.5rem;
        text-align: center;
        font-size: 14px;
        border-radius: 0.3rem;
        margin: auto;
      }
       @include desktop {
        gap: 2.5rem;
        text-align: center;
        font-size: 14px;
        border-radius: 0.3rem;
        margin: auto;
       }
      .count {
        display: flex;
        gap: 1rem;
      }
      button {
        text-align: center;
        align-items: center;
        width: 25px;
        height: 25px;
        border: none;
        background-color: $button_color;
        border-radius: 0.3rem;

        @include desktop {
          width: 2rem;
          height: 2rem;
        }
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
      // padding: 1rem 0;
      margin-right: auto;
      display: flex;
      flex-direction: column;
      gap: 2.5rem;
      text-align: center;
      font-size: 14px;
      border-radius: 0.3rem;

      @include tablet {
        margin: auto;
      }
       @include desktop {
        margin: auto;
       }
    }

  }
}
.total {
  width: 100%;
  margin: 4rem 0;
  display: flex;
  flex-direction: column;

  @include desktop {
    width: 50%;
    margin-left: auto;
  }

  .text {
    padding: 1rem;
    align-items: center;
    background-color: white;
    height: 4rem;
    display: flex;
    justify-content: space-between;

    label {
      font-size: 16px;
      font-weight: bold;
    }
  }
  .btn {
    

    button {
      width: 100%;
      height: 3rem;
      background-color: $header-color;
      color: white;
    }
  }
}
</style>