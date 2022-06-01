<script>
export default {
    name: "Register",

    data() {
        return {
            first_name: "",
            last_name: "",
            phone: "",
            email: "",
            password: "",
        };
    },
    
    methods: {
         async register() {
            const res = await fetch('http://localhost:8000/api/Register', {
                method: 'POST',
                body: JSON.stringify({
                    first_name: this.first_name,
                    last_name: this.last_name,
                    phone: this.phone,
                    email: this.email,
                    password: this.password,
                }),
            });
            const data = await res.json();
            if (data.success) {
                console.log('success');
            }else{
                console.log('error');   
            }
        }
    }
}
</script>

<template>
    <form @click.prevent="register" class="register" action="">
        <div class="info">
            <h1>S'inscrire</h1>
            <div class="input">
                <label>Nome</label>
                <input type="text" name="" placeholder="Nome" v-model="first_name">
            </div>
            <div class="input">
                <label>Prenome</label>
                <input type="text" name="" placeholder="Prenome" v-model="last_name">
            </div>
            <div class="input">
                <label>Phone</label>
                <input type="number" name="" placeholder="Phone" v-model="phone">
            </div>
            <div class="input">
                <label>E-mail</label>
                <input type="email" name="" placeholder="E-mail" v-model="email">
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="" placeholder="Password" v-model="password">
            </div>
            <input type="button" name="" value="S'inscrire">
        </div>
    </form>
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