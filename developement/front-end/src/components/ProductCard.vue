<script setup>
const props = defineProps({
  item: Object,
});
const increment = () => props.item.Quantite++;
const decrement = () => props.item.Quantite--;
</script>
<template>
  <div class="product">
    <div class="product_img">
      <img :src="`http://localhost/uploads/` + item.image" alt="" />
    </div>
    <div class="product_item">
        <div class="product_info">
            <div class="name">
                <p>{{ item.name }}</p>
                <p>{{ item.description }}</p>
            </div>
            <div class="counter">
                <div>
                <label>Quantité</label>
                </div>
                <div class="count">
                <button @click="decrement()">-</button>
                <p>{{ item.Quantite }}</p>
                <button @click="increment()">+</button>
                </div>
            </div>
            <div class="price">
                <label>Prix</label>
                <p>{{ item.price }}</p>
            </div>
        </div>
        <div class="total">
            <h3>Prix Total</h3>
            <p>{{ item.price * item.Quantite }}</p>
        </div>
    </div>
    <div @click="DeletePanier(item.product_id)" class="close">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
        <path
          d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"
        />
      </svg>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";
  .product {
    color: black;
    background-color: white;
    // padding: 0.5rem;
    display: flex;
    align-items: center;
    gap: 3rem;
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
    border-radius: 0.5rem;
    margin: 1rem 0;

    .product_img {
      width: 25%;

      @include mobile {
        width: 35%;
      }
      @include tablet {
        width: 20%;
      }

      @include desktop {
        width: 20%;
      }
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

    .product_item {
        margin: auto;
        display: flex;
        width: 60%;


        @include tablet {
            margin-top: 1rem;
            gap: 2rem;
            display: flex;
            flex-direction: column;
        }

        @include desktop {
            margin-top: 1rem;
            gap: 5.7rem;
            display: flex;
            flex-direction: column;
        }
    }

    .total {
        margin-top: auto;
        height: 2.5rem;
        background-color: #e9ecef;
        align-items: center;
        text-align: center;
        display: none;

        @include tablet {
            display: block;
            display: flex;
            justify-content: space-around;
        }
        @include desktop {
            display: block;
            display: flex;
            justify-content: space-around;

        }

        h3 {
            font-size: 16px;
            font-weight: bold;
        }
        p {
            font-size: 14px;
        }
    }

    .product_info {

      display: flex;
      flex-direction: column;
      gap: 0.5rem;

      p {
        font-size: 14px;
      }
      @include tablet {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        // gap: 5rem;
      }
      @include desktop {
        display: flex;
        justify-content: space-between;
        width: 100%;
      }
    }

    .counter {
    //   margin-right: auto;
      display: flex;
      flex-direction: column;

      @include tablet {
        display: flex;
        gap: 1rem;
        text-align: center;
        font-size: 14px;
        border-radius: 0.3rem;
        // margin: auto;
      }
      @include desktop {
        gap: 1rem;
        text-align: center;
        font-size: 14px;
        border-radius: 0.3rem;
        // margin: auto;
      }
      .count {
        align-items: center;
        display: flex;
        gap: 0.6rem;
      }
      button {
        text-align: center;
        align-items: center;
        width: 22px;
        height: 22px;
        border: none;
        font-weight: bold;
        border-radius: 0.3rem;

        @include desktop {
            font-size: 22px;
            width: 30px;
            height: 30px;
        }
      }
    }

    .close {
        padding: 5px;
        
      margin-left: auto;
      margin-bottom: auto;

      svg {
        width: 1.4rem;
        height: 1.4rem;
        cursor: pointer;
      }
    }

    .price {
    //   margin-right: auto;
      text-align: center;
      font-size: 14px;
      border-radius: 0.3rem;
      display: flex;

      @include tablet {
        display: flex;
          flex-direction: column;
          gap: 1rem;
      }

      @include desktop {
        display: flex;
          flex-direction: column;
          gap: 1rem;
      }
    }
  }
</style>
