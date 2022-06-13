<script setup>
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
  // if(!store.user.user_id) {
  //   alert("please go to Login");
  // }
  data.user_id = store.user.user_id;
  const res = await axios.post('http://localhost/api/AddBasket', data);
  const data2 = await res.data;
  if (data2) {
    console.log(data2);
  } else {
    console.log("error");
  }
}

onMounted (() => {
    GetOneProduct();
});

</script>

<template>
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
          <Router-Link to="/Command"><button class="command">Commande Maintenant</button></Router-Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.parent {
  padding: 4rem 1rem;

  @include tablet {
    padding: 4rem 8rem;
  }

  @include desktop {
    padding: 4rem 8rem;
  }

  @include lg-desktop {
    padding: 4rem 14rem;
  }
}

.product {
  padding: 1rem;
  background-color: $secondary-bg-color;
  border-radius: 0.5rem;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 2rem;

  @include tablet {
    padding: 2rem;
  }

  @include desktop {
    display: flex;
    align-items: center;
    flex-direction: row;
  }

  .img {
    width: 100%;
    position: relative;
    text-align: center;
    color: white;

    @include tablet {
      // width: 50%;
    }

    @include desktop {
    }

    img {
      width: 100%;
      height: 20rem;
      border-radius: 0.3rem;

      @include lg-desktop {
        width: 100%;
        height: 25rem;
      }
    }
  }

  .info {
    width: 100%;
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

    // .price {

    // }

    .button {
      width: 25rem;
      display: flex;
      gap: 4rem;
      button {
        width: 20%;
        height: 2.5rem;
        background-color: $header-color;
        color: white;
        border: none;
        border-radius: 0.3rem;
        font-size: 12px;
        // cursor: pointer;
      }
      .command {
          width: 10rem;
      }
    }
  }
}
</style>
