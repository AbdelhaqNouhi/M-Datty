<script setup>
import NavBar from './NavBar.vue';
import Footer from './Footer.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';
import router from '../router';

const store = useStore();
const id = store.user.user_id;
const total = store.total;

const items = ref([]);
const itemsUser = ref([]);

const ville = ref('');
const adress = ref('');

const AddCommande = async function () {
    console.log(items.value);
    console.log(itemsUser.value);
    const promises = items.value.map(async(product) => {
        const data = {
            product_name: product.name,
            user_name: itemsUser.value.first_name + itemsUser.value.last_name,
            phone: parseInt(itemsUser.value.phone),
            ville: ville.value,
            adress: adress.value,
            quantite: product.Quantite,
            total_prix: total,
            product_id: product.product_id,
            user_id: id,
        };
        const res = await axios.post('http://localhost/api/AddCommande', data);
        return  res.data;
    });
    const results = await Promise.all(promises);
    if(results) {
        router.push('/');
        alert('Commande ajoutée avec succès');
    }
}

const GetBasket = async function () {
    const res = await axios.get('http://localhost/api/GetBasket?id=' + id);
    const data = await res.data;
    if (data) {
        items.value = data;
        } else {
            console.log("error");
        }
    }

const GetUser = async function () {
    const res = await axios.get('http://localhost/api/GetUsers?id=' + id);
    const data = await res.data;
    if (data) {
        itemsUser.value = data;
    } else {
        console.log("error");
    }
}

onMounted (() => {
    GetBasket();
    GetUser();
});

</script>

<template>
<NavBar />
<div class="parent">
    <div class="PageUser">
        <div class="info">
            <h1>personal info</h1>
            <div class="username">
                <input type="text" name="prenome" placeholder="Prenom" v-model="itemsUser.first_name">
                <input type="text" name="nom" placeholder="Nom de famille" v-model="itemsUser.last_name">
            </div>
            <div class="social">
                <input type="tel" name="phone" placeholder="Phone" v-model="itemsUser.phone">
                <input type="text" name="ville" placeholder="Ville" v-model="ville">
            </div>
        </div>
        <div class="adress">
            <div class="city">
                <textarea name="adress" id="" cols="30" rows="3" placeholder="Adress" v-model="adress"></textarea>
            </div>
        </div>
        <div class="button">
            <button class="cancel">Cancel</button>
            <button @click="AddCommande" class="save">FINALISER LA COMMAND</button>
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
            <label>SOUS-TOTAL</label>
            <p>{{total}} MAD</p>
        </div>
    </div>
</div>
<Footer />
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
    }
    .button {
        // width: 100%;
        display: flex;
        justify-content: space-between;

        .cancel{
            border-radius: 0.2rem;
            padding: 0.6rem;
            background-color: var(--corvid-background-color,rgba(var(--bg,var(--color_17)),var(--alpha-bg,1)));

            @include desktop {
                width: 6rem;
            }

        }
        .save{
            border: none;
            border-radius: 0.2rem;
            padding: 0.6rem;
            background-color: $header-color;
            color: white;

            @include desktop {
                width: 48%;
            }
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
    padding: 1rem;
    align-items: center;
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    width: 100%;
    height: 25%;
    box-shadow: 1px 1px 0px 0px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid black;
}
      label {
          font-size: 16px;
        font-weight: bold;
      }
}
</style>