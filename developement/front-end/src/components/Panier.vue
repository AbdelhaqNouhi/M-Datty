<script setup>
import NavBar from '../components/NavBar.vue'
import ProductCard from './ProductCard.vue';
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useStore } from '@/stores/counter'

const store = useStore()
// const showPanier = store.showPanier;
const id = store.user.user_id;
const e = store.count;


// const aa = ref(0);

const items = ref([]);

// const updateQuantiti = function (id) {
//    const res = axios.post('http://localhost/api/UpdateBasket', id);
//     const data = res.data;
//     if(data) {
//       console.log(data);
//     } else {
//       console.log('error');
//     }
// }

const GetBasket = async function () {
  const res = await axios.get('http://localhost/api/GetBasket?id=' + id);
  const data = await res.data;
  if (data) {
    e(data);
    items.value = data;
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
      <ProductCard v-for="item in items" :item="item"/>
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
}
</style>