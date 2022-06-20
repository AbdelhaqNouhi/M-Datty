<script setup>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import ProductCard from './ProductCard.vue';
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useStore } from '@/stores/counter'

const store = useStore()
// const id = store.user.user_id;
const e = store.count;
const total = store.total;

const items = ref([]);


const GetBasket = async function () {
  const res = await axios.get('http://localhost/api/GetBasket?id=' + id);
  const data = await res.data;
  if (data) {
    e(data.length);
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
    store.count(parseInt(store.counter) - 1);
    GetBasket();
    alert("Delete Panier Successfully");
  } else {
    alert("product not added try again");
  }
}

onMounted (() => {
  GetBasket();
});


</script>
<template>
<NavBar />
  <div class="parent">
    <div class="panier">
      <div class="card">
        <h1>Panier</h1>
        <ProductCard v-for="item in items" :item="item" @delete="DeletePanier"/>
      </div>
        <div class="total">
          <h5>Récapitulatif de la commande</h5>
            <div class="text">
              <label>SOUS-TOTAL</label>
              <p>{{store.total}} MAD</p>
            </div>
            <div class="btn">
              <router-link to="/Command"><button>FINALISER LA COMMAND</button></router-link>
            </div>
        </div>
    </div>
  </div>
<Footer />
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.router-link-active {
  color: $button-color;
  border-bottom: none;
}
.parent {
  border-radius: 0.3rem;
  display: flex;
  flex-direction: row;
  justify-content: center;
  // width: 100%;
  background: white;
  align-items: center;

}

.panier {
  width: 90%;
  margin-top: 8rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;


  @include desktop {
    display: flex;
    flex-direction: row;
    margin: 10rem 0;
    width: 80%;
  }
}

.card {
  width: 100%;
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: $secondary-bg-color;
  display: flex;
  align-items: center;
}
.total {
  padding: 1rem;
  width: 100%;
  height: 50vh;
  border-radius: 0.5rem;
  background-color: $secondary-bg-color;
  display: flex;
  flex-direction: column;
  gap: 3rem;

  @include desktop {
    width: 40%;
  }
}

  .text {
    align-items: center;
    border-bottom: 1px solid black;
    height: 2.5rem;
    display: flex;
    justify-content: space-between;

    label {
      font-size: 16px;
      font-weight: bold;
    }
  }
  .btn {
    

    button {
      border-radius: 0.5rem;
      width: 100%;
      height: 3rem;
      background-color: $header-color;
      color: white;
    }
  }
</style>