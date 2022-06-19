<script setup>
import { useStore } from "@/stores/counter";
import {useRouter} from 'vue-router';


const store = useStore();
const setAdmin = store.setAdmin;
</script>

<template>
    <div class="nav">
        <div class="logo">
            <img src="../../assets/images/icone/logo.png" alt="">
            <div class="username">
                <img src="../../assets/images/aboutus.jpg" alt="...">
                <h1>{{store.admin?.last_name ?? ""}} {{store.admin?.first_name ?? ""}}</h1>
            </div>
            <div class="content">
                <div class="add">
                    <button class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajoute Produit</button>
                </div>
                <div class="mune">
                    <Router-Link to="/PageAdmin">Produits</Router-Link>
                    <Router-Link to="/AdminCommand">Commande</Router-Link>        
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";



.nav {
    width: 20%;
    height: 100vh;
    align-items: center;
    display: flex;
    justify-content: center;
    gap: 4rem;
    background-color: $header-color;
    // padding: 0 0.5rem;

    .logo {
        margin-bottom: auto;
        display: flex;
        flex-direction: column;
        gap: 4rem;
        img {
            width: 10rem;
        }
        .username {
            align-items: center;
            display: flex;
            gap: 1rem;
            img {
                width: 2rem;
                height: 2rem;
                border-radius: 5rem;
                border: 2px solid white;
            }
            h1 {
                color: white;
                font-size: 14px;
            }
        }

    }
    .content {
        display: flex;
        flex-direction: column;
        gap: 4rem;
    }
    .add {
        background-color: white;
        width: 100%;
        padding: 0.5rem;
        text-align: center;
        border-radius:0.3rem;

        button {
            color: black;
        }
    }

    .mune {
        width: 100%;
        gap: 2rem;
        display: flex;
        flex-direction: column;
        text-align: center;

            a {
                padding: 0.5rem;
                width: 100%;
                border-bottom: 1px solid white;
                color: white;
                text-decoration: none;
            }
    }
}
</style>