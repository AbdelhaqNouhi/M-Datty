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
                    <Router-Link to="/">Home</Router-Link>
                    <Router-Link to="/Boutique">Boutique</Router-Link>
                    <Router-Link to="/Contact">Contact</Router-Link>
                </nav>
            </div>
            <div class="img-user">
                <img  src="../assets/images/pexels-brett-jordan-9074993.jpg" alt="">
                <Router-Link to="/Login"><button>Login</button></Router-Link>
            </div>
        </header>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";

.piblisite {
    font-size: 13px;
    height: 2.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: $button-color;
}
.navbar {
    background-color: $header-color;
}
header {
    height: 3.5rem;
    padding: 0rem 5rem;
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
        font-size: 14px;
        width: 4rem;
        height: 1.6rem;
        border: none;
        border-radius: 0.2rem;
        color: white;
        background-color: $button-color;
    }
     .img-user {
        //  margin-left: 1.5rem;
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
.router-link-active {
  color: #fff;
  background-color: #00a65a;
  border: solid 1px #00a65a;
}
</style>