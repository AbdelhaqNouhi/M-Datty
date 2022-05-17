<script>
export default {
    name: "Register",
}
</script>

<template>
    <form class="login" action="">
        <div class="info">
            <h1>S'inscrire</h1>
            <div class="input">
                <label>Nome</label>
                <input type="text" name="" placeholder="Nome">
            </div>
            <div class="input">
                <label>Prenome</label>
                <input type="text" name="" placeholder="Prenome">
            </div>
            <div class="input">
                <label>Phone</label>
                <input type="number" name="" placeholder="Phone">
            </div>
            <div class="input">
                <label>E-mail</label>
                <input type="email" name="" placeholder="E-mail">
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="" placeholder="Password">
            </div>
            <input type="button" name="" value="S'inscrire">
        </div>
    </form>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
.login {
    padding: 5rem;
    display: flex;
    justify-content: center;
}
.info {
    padding: 1.5rem;
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3rem;
    background-color: $secondary-bg-color;
    border-radius: 0.5rem;

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