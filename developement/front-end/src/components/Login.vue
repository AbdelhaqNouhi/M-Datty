<script setup>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import { useStore } from '@/stores/counter';
import Cookies from 'js-cookie';
import { useRouter } from 'vue-router';
import { ref } from 'vue';


const store = useStore();
const setUser = store.setUser;

const email = ref('');
const password = ref("");
const check = ref(false);
const router = useRouter();

const login =  async function () {
    const res = await fetch('http://localhost/api/Login', {
        method: 'POST',
        body: JSON.stringify({
            email: email.value,
            password: password.value,
        }),
    });
    const data = await res.json();
    if (!data.error) {
        setUser(data);
        if(data.role == "admin"){
        router.push('/PageAdmin');
        alert("Login Successful");
        }
        else if (data.role == "user"){
        router.push('/');
        alert("Login Successful");
        }
    }
    else {
        check.value = true;
    }
}
</script>

<template>
<div>
    <NavBar />
    <form class="login" action="">
        <div class="info">
            <h1>Connexion</h1>
            <div class="input">
                <label>E-mail</label>
                <input type="email" name="" placeholder="E-mail" v-model="email" />
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="" placeholder="Password" v-model="password" />
                <div v-if="check" class="check">E-mail Or Password ivalide?</div>
            </div>
            <input @click.prevent="login" type="submit" name="" value="Connexion" />
            <div class="register">
                <router-link to="/Register">S'inscrire</router-link>
            </div>
        </div>
    </form>
    <Footer />
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.login {
    padding: 4rem 2rem;
    display: flex;
    justify-content: center;
}

.info {
    margin-top: 4rem;
    padding: 1.5rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 4rem;
    background-color: $secondary-bg-color;
    border-radius: 0.5rem;

    @include desktop {
        width: 50%;
    }

    h1 {
        font-weight: normal;
        margin: 0;
        text-align: center;
    }

    p {
        margin: 0;
        text-align: center;
    }

    input {
        font-weight: bold;
        padding: 0.8em;
        border: none;
        border-radius: 0.3rem;
        background-color: $header-color;
        color: white;
    }
}

.input {
    font-size: 14px;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    gap: 1rem;

    input {
        font-weight: normal;
        color: black;
        padding: 1rem;
        border-radius: 0px;
        border-bottom: 1px solid black;
        padding: 0.2rem;
        outline: none;
        background-color: transparent;
    }
}

.register {
    a {
        display: flex;
        justify-content: flex-end;
        font-size: 18px;
        font-weight: bold;
        color: $header-color;
    }
}

.check {
    color: red;
}
</style>
