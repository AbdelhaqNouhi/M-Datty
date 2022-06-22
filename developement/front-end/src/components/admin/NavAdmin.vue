<script setup>
import { useStore } from "@/stores/counter";
import {useRouter} from 'vue-router';

const store = useStore();
const router = useRouter();

const setUser = store.setUser;

const logout = function () {
    setUser(null);
    router.push('/loginAdmin')
}
</script>

<template>
    <div class="nav">
        <div class="logo">
            <img src="../../assets/images/icone/logo.png" alt="">
            <div class="username">
                <img src="../../assets/images/aboutus.jpg" alt="...">
                <h1>{{store.user?.last_name ?? ""}} {{store.user?.first_name ?? ""}}</h1>
            </div>
            <div class="content">
                <div class="add">
                    <button class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrops">Ajoute Produit</button>
                </div>
                <div class="mune">
                    <Router-Link to="/PageAdmin">Produits</Router-Link>
                    <Router-Link to="/AdminCommand">Commande</Router-Link>        
                </div>
            </div>
            <div class="logout">
                <button @click="logout"><img src="../../assets/images/icone/logout-admin.svg" alt=""/><p>LogOut</p></button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";



.nav {
    width: 15%;
    height: 100vh;
    position: fixed;
   
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
        background-color: $button-color;
        width: 100%;
        padding: 0.5rem;
        text-align: center;
        border-radius:0.3rem;

        button {
            background-color: $button-color;
            color: white;
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

.logout {
    text-align: center;
    align-items: center;
    display: flex;
    gap: 0.5rem;
    width: 5rem;
    height: 5rem;
    // margin-top: auto;
    margin-right: 4rem;
    img {
        height: 2rem ;
    }
    button {
        background-color: $header-color;
        border: none;
    }
    p {
        font-size: 14px;
        font-weight: bold;
    }
}
</style>