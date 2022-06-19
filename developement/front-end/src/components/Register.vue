<script setup>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import axios from 'axios';
import { useRouter } from 'vue-router';
import { ref } from 'vue';

const first_name = ref('');
const last_name = ref('');
const phone = ref('');
const email = ref('');
const password = ref('');

const register = async function () {
    const res = await axios.post('http://localhost/api/Register', {
    first_name: first_name.value,
    last_name: last_name.value,
    phone: phone.value,
    email: email.value,
    password: password.value,
    });
    const data = await res.data;
    if (data) {
    console.log(data);
    } else {
    console.log("error");
    }
}

</script>

<template>
<NavBar />
    <form class="register" action="">
        <div class="info">
            <h1>S'inscrire</h1>
            <div class="input">
                <label>Nome</label>
                <input type="text" name="" placeholder="Nome" v-model="first_name" required>
            </div>
            <div class="input">
                <label>Prenome</label>
                <input type="text" name="" placeholder="Prenome" v-model="last_name" required>
            </div>
            <div class="input">
                <label>Phone</label>
                <input type="number" name="" placeholder="Phone" v-model="phone" required>
            </div>
            <div class="input">
                <label>E-mail</label>
                <input type="email" name="" placeholder="E-mail" v-model="email" required>
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="" placeholder="Password" v-model="password" required>
            </div>
            <input @click="register" type="button" name="" value="S'inscrire">
        </div>
    </form>
<Footer />
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";
.register {
    padding: 2rem;
    display: flex;
    justify-content: center;
}
.info {
    margin-top: 6rem;
    padding: 1.5rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 3rem;
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
</style>