<script setup>
import NavBar from './NavBar.vue';
import { useStore } from '@/stores/counter';

const store = useStore();

const total = store.total;

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
        <div class="product_info">
            <h5>Récapitulatif de la commande</h5>
            <div class="product_img">
                <!-- <img :src="`http://localhost/uploads/` + item.image" alt="" /> -->
                <img src="../assets/images/aboutus.jpg" alt="">
            </div>
            <div class="name">
                <p>aaaa</p>
                <p>aaaaaa</p>
            </div>
            <div class="price">
                <label>Prix</label>
                <p>aaaaaaaaa</p>
            </div>
        </div>
        <div class="total_prix">
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
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";


.parent{
    padding: 6rem 1rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 1rem;

    @include desktop {
        padding: 8rem;
        display: flex;
        flex-direction: row;
        width: 100%;
    }
}

.PageUser {
    width: 100%;
    padding: 2rem 1rem;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 4rem;
    background-color: $secondary-bg-color;
    border: none;
    border-radius: 0.5rem;

    @include desktop {
        width: 70%;
        padding: 2rem;
    }
}
    .total {
        display: flex;
        justify-content: space-around;

        p {
            font-size: 18px;
            font-weight: bold;
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
                gap: 8rem;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
                gap: 4rem;
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
                gap: 8rem;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
                gap: 4rem;
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
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2rem;

            @include desktop {
                display: flex;
                flex-direction: row;
                gap: 8rem;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
                gap: 10rem;
            }
            

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
                gap: 8rem;
            }
            @include lg-desktop {
                display: flex;
                flex-direction: row;
                gap: 4rem;
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

        @include desktop {
            gap: 1rem;
        }
        @include lg-desktop {
            width: 100%;
            gap: 4rem;
        }

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
    width: 100%;
    padding: 2rem;
    display: flex;
    gap: 5rem;
    flex-direction: column;
    background-color: $secondary-bg-color;
    border-radius: 0.5rem;

    @include desktop {
        width: 30%;
    }

    .product_info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
        .product_img {
            width: 5rem;

            // @include mobile {
            //     width: 35%;
            // }
            // @include tablet {
            //     width: 20%;
            // }

            // @include desktop {
            //     width: 20%;
            // }
            img {
                border-radius: 0.2rem;
                width: 100%;
            }
        }

    .total_prix {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        justify-content: space-around;
    }
}
</style>