<script>
    export default {
        name: "NavBar",
    }
</script>

<template>
<div class="navbar">
    <div class="piblisite">
        <p>​En ce moment, livraison par coursier ( sur Toulouse et banlieue) offerte dès 29€ d'achat !</p>
    </div>
    <div class="navbar">
        <header>
            <img alt="Vue logo" class="logo" src="../assets/images/logo 2.png"/>

            <div class="wrapper">
                <nav>
                    <RouterLink to="/">Home</RouterLink>
                    <RouterLink to="/Boutique">Boutique</RouterLink>
                    <RouterLink to="/Contact">Contact</RouterLink>
                </nav>
            </div>
            <div class="img-user">
                <img  src="../assets/images/pexels-brett-jordan-9074993.jpg" alt="">
                <RouterLink to="/Login"><button>Login</button></RouterLink>
            </div>
        </header>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
*{
    font-family: $fonts;
}
.piblisite {
    font-size: 13px;
    height: 2.5rem;
    display: flex;
    justify-content: center;
    background-color: $button-color;
}
.navbar {
    background-color: $header-color;
}
header {
    height: 3.5rem;
    margin: 0rem 5rem;
    display: flex;
    justify-content: space-between;

    nav {
        font-size: 14px;
        margin: 1.5rem auto;
        display: flex;
        gap: 5rem;

        a {
            color: white;
            text-decoration: none;
        }
    }
    button{
        margin: 1rem auto;
        font-size: 14px;
        width: 4rem;
        height: 1.6rem;
        border: none;
        border-radius: 0.2rem;
        color: white;
        background-color: $button-color;
    }
     .img-user {
         display: flex;
         gap: 1rem;
         align-items: center;
        img{
            border-radius: 5rem;
            width: 1.6rem;
            height: 1.6rem;
        }
    }
}

</style>