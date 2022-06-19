<script setup>
import NavBar from './NavBar.vue';
import Footer from './Footer.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useStore } from '@/stores/counter';

const store = useStore();
const id = store.user.user_id;

const items = ref([]);

const GetUser = async function () {
    const res = await axios.get('http://localhost/api/GetUsers?id=' + id);
    const data = await res.data;
    if (data) {
        items.value = data;
    } else {
        alert('please login');
    }
}

onMounted (() => {
    GetUser();
});

</script>

<template>
<NavBar />
    <div class="parent">
        <div class="PageUser">
            <div class="info">
                <h1>personal info</h1>
                <!-- <h1>{{items}}</h1> -->
                <div class="username">
                    <input type="text" name="prenome" placeholder="Prenom" v-model="items.first_name">
                    <input type="text" name="nom" placeholder="Nom de famille" v-model="items.last_name">
                </div>
                <div class="social">
                    <input type="email" name="email" placeholder="E-mail" v-model="items.email">
                    <input type="tel" name="phone" placeholder="Phone" v-model="items.phone">
                </div>
                <div class="city">
                    <input type="text" name="adress" placeholder="Adress">
                    <input type="text" name="ville" placeholder="Ville">
                </div>
            </div>
            <div class="button">
                <button class="cancel">Cancel</button>
                <button class="save">Save change</button>
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
}
.PageUser {
    width: 100%;
    margin: 6rem 1rem;
    padding: 2rem;
    background-color: $secondary-bg-color;
    display: flex;
    flex-direction: column;
    border: none;
    border-radius: 0.5rem;
    gap: 2rem;

    @include tablet {
        margin: 6rem 4rem;
    }

    @include desktop {
        margin: 10rem 15rem;
    }

    h1 {
        font-weight: normal;
    }

    .info {
        display: flex;
        flex-direction: column;
        gap: 4rem;
    }
   .username {
        // width: 100%;
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 4rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 6rem;
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
            gap: 4rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 6rem;
        }

        input {
            width: 100%;
            border-radius: 0.2rem;
            border: none;
            padding: 0.8rem;
        }
    }
    .city {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 4rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 6rem;
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
    width: 100%;
    display: flex;
    justify-content: space-between;

    @include desktop {
        margin-left: auto;
        gap: 1rem;
    }
    @include lg-desktop {
        width: 46%;
        margin-left: auto;
        gap: 10rem;
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
</style>