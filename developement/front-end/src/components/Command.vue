<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import NavBar from './NavBar.vue';
import { useStore } from '@/stores/counter';

const store = useStore();
const id = store.user.user_id;
const total = store.total;

const items = ref([]);

const GetBasket = async function () {
    const res = await axios.get('http://localhost/api/GetBasket?id=' + id);
    const data = await res.data;
    if (data) {
        items.value = data;
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
<div class="parent">
    <div class="PageUser">
        <!-- <div class="total">
            <p>TOTAL PRIX:</p>
            <p>{{total}} MAD</p>
        </div> -->
        <div class="info">
            <h1>personal info</h1>
            <div class="username">
                <input type="text" name="prenome" placeholder="Prenom">
                <input type="text" name="nom" placeholder="Nom de famille">
            </div>
            <div class="social">
                <input type="email" name="email" placeholder="E-mail">
                <input type="tel" name="phone" placeholder="Phone">
            </div>
        </div>
        <div class="adress">
            <div class="city">
                <textarea name="adress" id="" cols="30" rows="3" placeholder="Adress"></textarea>
            </div>
            <div class="pays">
                <input type="text" name="code" placeholder="Code postal">
                <input type="text" name="ville" placeholder="Ville">
            </div>
        </div>
        <div class="button">
            <button class="cancel">Cancel</button>
            <button class="save">Sauvegarder</button>
        </div>
    </div>
    <div class="card_t">
        <h5>Récapitulatif de la commande</h5>
        <div v-for="item in items" class="product_info">
            <div class="product_img">
                <img :src="`http://localhost/uploads/` + item.image" alt="" />
            </div>
            <div class="np">
                <div class="name">
                    <p>{{ item.name }}</p>
                </div>
                <div class="price">
                    <label>Prix</label>
                    <p>{{ item.price }}</p>
                </div>
            </div>
        </div>
        <div class="total_prix">
            <div class="text">
                <label>SOUS-TOTAL</label>
                <p>{{total}} MAD</p>
            </div>
            <div class="btn">
                <router-link to="/Command"><button>FINALISER LA COMMAND</button></router-link>
            </div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";


.parent{
    padding: 6rem 1rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;

    @include desktop {
        padding: 8rem 5rem;
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    @include lg-desktop {
        padding: 8rem;
    }
}

.PageUser {
    width: 100%;
    padding: 2rem 1rem;
    display: flex;
    flex-direction: column;
    gap: 2rem;
    background-color: $secondary-bg-color;
    border: none;
    border-radius: 0.5rem;

    @include tablet {
        width: 80%;
    }

    @include desktop {
        width: 80%;
        padding: 2rem;
    }
}
    .info {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        // h1 {
        //     font-weight: normal;
        // }

    .username {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2rem;

            @include desktop {
                display: flex;
                flex-direction: row;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
            }

            input {
                width: 100%;
                border-radius: 0.2rem;
                border: none;
                padding: 0.8rem;
            }
        }
        .social {
            display: flex;
            flex-direction: column;
            gap: 2rem;

            @include desktop {
                display: flex;
                flex-direction: row;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
            }

            input {
                width: 100%;
                border-radius: 0.2rem;
                border: none;
                padding: 0.8rem;
            }
        }
    }
    .adress {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        h1 {
            font-weight: normal;
        }

        .city {
            textarea {
                width: 100%;
                border-radius: 0.2rem;
                border: none;
                padding: 0.8rem;
            }
        }
        .pays {
            display: flex;
            flex-direction: column;
            gap: 2rem;

            @include desktop {
                display: flex;
                flex-direction: row;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
            }

            input {
                width: 100%;
                border-radius: 0.2rem;
                border: none;
                padding: 0.8rem;
            }
        }
    }
    .button {
        // width: 100%;
        display: flex;
        justify-content: space-between;

        .cancel{
            width: 6rem;
            border-radius: 0.2rem;
            padding: 0.6rem;
            background-color: var(--corvid-background-color,rgba(var(--bg,var(--color_17)),var(--alpha-bg,1)));

        }
        .save{
            width: 12rem;
            border: none;
            border-radius: 0.2rem;
            padding: 0.6rem;
            background-color: $header-color;
            color: white;
        }
    }
.card_t {
    margin-bottom: auto;
    width: 100%;
    height: 100%;
    padding: 1rem;
    display: flex;
    gap: 1rem;
    flex-direction: column;
    background-color: $secondary-bg-color;
    border-radius: 0.5rem;

    @include tablet {
        width: 80%;
    }

    @include desktop {
        width: 50%;
    }

    h5 {
        text-align: center;
    }

    .product_info {
        display: flex;
        gap: 3rem;
    }
        .product_img {
            width: 20%;

            @include mobile {
                width: 30%;
            }
            @include tablet {
                width: 20%;
            }

            @include desktop {
                width: 33%;
            }

            @include lg-desktop {
                width: 25%;
            }
            img {
                border-radius: 0.2rem;
                width: 100%;
            }
        }

        .np {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1rem;

            label {
                font-weight: bold;
            }
        }

   .total_prix {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    width: 100%;
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
      width: 100%;

    button {
      border-radius: 0.5rem;
      width: 100%;
      height: 3rem;
      background-color: $header-color;
      color: white;
    }
  }
}
</style>