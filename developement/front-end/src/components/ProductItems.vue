<script setup>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';
import { RouterView, useRoute } from 'vue-router';


const store = useStore();
const route = useRoute();

const Box = ref([]);
const id = route.params.id;

const GetOneProduct = async function () {
    const res = await axios.get(`http://localhost/api/GetOneProduct?id=${id}`);
    const data = await res.data;
    if (data) {
        Box.value = data;
    } else {
        console.log("error");
    }
}

const takeId = async function (data) {
  if(!store.user.user_id) {
    router.push('/login');
    alert("please go to Login");
  }
  data.user_id = store.user.user_id;
  await axios.post('http://localhost/api/AddBasket', data)
  .then(function (response) {
    if(response.data.message === "Basket added successfully") {
      store.count(parseInt(store.counter) + 1);
      alert("produit ajoute a votre panier");
      GetOneProduct();
    }
    else {
      alert("Produit déjà trouvé dans votre panier");
    }
  })
}

onMounted (() => {
    GetOneProduct();
});

</script>

<template>
<NavBar />
  <div class="parent">
    <div class="product">
      <div class="img">
        <img :src="`http://localhost/uploads/` + Box.image" alt="" />
      </div>
      <div class="info">
        <div class="name">
          <h3>{{Box.name}}</h3>
        </div>
        <div class="descriptions">
          <p>
            {{Box.description}}
          </p>
        </div>
        <div class="price">    
            <h3>{{Box.price}}</h3>
        </div>
        <div class="button">
          <button @click="takeId(Box)">add to card</button>
        </div>
      </div>
    </div>
  </div>
<Footer />
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.parent {
  display: flex;
  justify-content: center;
  align-items: center;
}

.product {
  width: 60%;
  margin: 8rem;
  padding: 1rem;
  background-color: $secondary-bg-color;
  border-radius: 0.5rem;
  display: flex;
  justify-content: center;
  flex-direction: column;

  @include tablet {
    padding: 2rem;
  }

  @include desktop {
    display: flex;
    align-items: center;
    flex-direction: row;
    gap: 4rem;
  }

  .img {
    width: 70%;
    color: white;

    @include tablet {
      // width: 50%;
    }

    @include desktop {
    }

    img {
      width: 100%;
      height: 45vh;
      border-radius: 0.3rem;
    }
  }

  .info {
    width: 50%;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    height: 100%;

    @include desktop {
      width: 50%;
      gap: 2rem;
    }

    @include lg-desktop {
      width: 100%;
      gap: 2rem;
    }

    .descriptions {
      flex-wrap: wrap;
    }
    .button {
      width: 25rem;
      display: flex;
      gap: 4rem;
      button {
        height: 2.5rem;
        width: 10rem;
        background-color: $header-color;
        color: white;
        border: none;
        border-radius: 0.3rem;
        font-size: 12px;
        // cursor: pointer;
      }
    }
  }
}
</style>
