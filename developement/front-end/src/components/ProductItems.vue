<script>
import axios from 'axios';
export default {
  name: "ProductItems",
  data() {
      return {
        Box: [],
        id: this.$route.params.id,
    };
  },

  methods: {
    GetOneProduct() {
        axios.get(`http://localhost:8000/api/GetOneProduct?id=${this.id}`)
        .then(response => {
            this.Box = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    },
  },

  mounted() {
    this.GetOneProduct();
  },
}
</script>

<template>
  <div class="parent">
    <div class="product">
      <div class="img">
        <img :src="`http://localhost:8000/uploads/` + Box.image" alt="" />
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
          <button>add to card</button>
          <button class="command">Commande Maintenant</button>
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
        width: 50%;
      }
    }
  }
}
</style>
