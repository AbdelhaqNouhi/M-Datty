<script setup>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';

const store = useStore();
const user = store.user;

const Box = ref([]);
const succes = ref(false) ;

const GetProduct = async function () {
    const res = await axios.get('http://localhost/api/GetProduct');
    const data = await res.data;
    if (data) {
        Box.value = data;
    } else {
        console.log("error");
    }
}

const ckeck = function (data) {
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
      GetProduct();
    }
    else {
      alert("Produit déjà trouvé dans votre panier");
    }
  })
}


setTimeout(() => {
  succes.value = false;
3});

onMounted (() => {
    GetProduct();
});

</script>

<template>
<NavBar />
<div class="parent">
  <!-- <div v-if="succes" class="alert">
      <p>Add Panier Successfully</p>
  </div> -->
  <div class="produits">
      <div v-for="box in Box" class="produit">
        <div class="image">
          <Router-Link :to="{ name: 'ProductItems', params: { id: box.product_id }}" ><img :src="`http://localhost/uploads/` + box.image" alt="" /></Router-Link>
        </div>
        <div class="description">
          <div class="a">
            <div>
              <p>{{box.name}}</p>
            </div>
            <div @click="ckeck(box)" class="card">
              <img src="../assets/images/icone/shopping-cart-svgrepo.svg" alt="">
            </div>
          </div>
          <div>
            <h1>{{box.price}}</h1>
          </div>
        </div>
      </div>
    </div>
</div>
<Footer />
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

// .alert {
//   background-color: rgb(117, 239, 117);
//   width: 30%;
//   padding: 1rem;
//   // margin: auto;
//   margin-left: 61%;
//   // position: absolute;
//   position: fixed;

//   @include tablet {
//     margin-left: 71%;
//     // margin-left: auto;
//     width: 25%;
//     padding: 0.7rem;
//   }
//   @include desktop {
//     margin-left: 80%;
//     width: 20%;
//     padding: 0.7rem;
//   }
//   @include lg-desktop {
//     margin-left: 80%;
//     width: 20%;
//     padding: 0.7rem;
//   }

//   p {
//     font-size: 14px;
//   }
// }

.parent{
  position: relative;
    padding: 4rem 0;
    display: flex;
    flex-direction: column;

    @include tablet {
      padding: 4rem 0;
    }

    @include desktop {
      padding: 5rem 0;
    }
}
.produits {
  display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 5rem 2rem;
    margin: 4rem;

    @include mobile {
      display: grid;
      gap: 5rem 2rem;
      margin: 2rem;
    }


  @include tablet {
    margin: 4rem 2rem;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 5rem 2rem;
  }

  @include desktop {
    margin: 4rem;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
  }

  @include lg-desktop {
    display: grid;
    gap: 5rem 2rem;

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
        // height: 100%;
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
