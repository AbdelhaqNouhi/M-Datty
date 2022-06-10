<script setup>
// import { computed } from '@vue/reactivity';
import { useStore } from "@/stores/counter";
import {useRouter} from 'vue-router';
// import Cookies from 'js-cookie';
import { ref } from 'vue';


// const cookie = Cookies.get('user');
const store = useStore();
const Panier = store.Panier;
const showPanier = store.showPanier;
const setUser = store.setUser;


// data
const show = ref(false);
const menuIcon = ref('close');
const check = ref(true);


const logout = function () {
  setUser(null);
  Router.push('/');
}

const openMenu = function () {
  if(!show.value){
    menuIcon.value = 'open';
    check.value = false;
  }
}

const closeMenu = function () {
    menuIcon.value = 'close';
    check.value = true;
}

const openstore = function () {
    if(menuIcon.value === 'close'){
        showPanier();
        show.value =! show.value;
    }
}

</script>

<template>
  <div>
    <!-- <div class="piblisite">
        <p>​En ce moment, livraison par coursier ( sur Toulouse et banlieue) offerte dès 29€ d'achat !</p>
    </div> -->
    <header class="navbar">
      <div class="logo">
        <img
          alt="Vue logo"
          class="logo"
          src="../assets/images/icone/logo 2.png"
        />
      </div>
      <nav class="menu">
        <Router-Link to="/">Home</Router-Link>
        <Router-Link to="/Boutique">Boutique</Router-Link>
        <a href="/#Contact">Contact</a>
      </nav>
      <nav :class="menuIcon">
        <Router-Link to="/">Home</Router-Link>
        <Router-Link to="/Boutique">Boutique</Router-Link>
        <a href="#Contact">Contact</a>
        <Router-Link to="/Login"><button v-if="!store.user" class="loginMobile">Login</button></Router-Link>
        <button v-if="store.user" @click="logout" class="login">Log Out</button>
      </nav>
      <div class="img-user">
        <div @click="openstore" class="cart">
          <img src="../assets/images/icone/Shopping Cart.svg" alt="" />
        </div>
        <div class="user">
          <div class="user_info">
            <img src="../assets/images/aboutus.jpg" alt="" />
            <p>{{store.user?.first_name ?? ""}}</p>
          </div>
          <Router-Link to="/Login"><button v-if="!store.user" class="login">Login</button></Router-Link>
          <button v-if="store.user" @click="logout" class="login">Log Out</button>
        </div>
      </div>
      <!-- <div class="mune-close"> -->
      <button v-if="check" @click="openMenu">
        <img src="../assets/images/icone/menu.svg" alt="" />
      </button>
      <button v-if="!check" @click="closeMenu">
        <img class="drop" src="../assets/images/icone/close.svg" alt="" />
      </button>
      <!-- </div> -->
    </header>
  </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

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
  padding: 0rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;

  @include desktop {
    padding: 0rem 5rem;
  }
  button {
    display: block;
    border: none;
    background-color: $header-color;

    @include desktop {
      display: none;
    }
  }
}
.menu {
  display: none;
  @include desktop {
    display: flex;
    font-size: 14px;
    gap: 3rem;
  }
  a {
    color: white;
    text-decoration: none;
  }
}
.open {
  display: flex;
  position: absolute;
  top: 100%;
  z-index: 1;
  background-color: #4e4a42;
  padding: 5rem;
  flex-direction: column;
  font-size: 14px;
  gap: 3rem;
  align-items: center;
  width: 100%;
  left: 0;
  transform: translateX(0%);
  transition: all 0.5s ease-in-out;
  @include desktop {
    display: none;
  }
  a {
    font-size: 16px;
    color: white;
    text-decoration: none;
  }
  button {
    width: 8rem;
    height: 2rem;
  }
}
.close {
  display: flex;
  position: absolute;
  top: 100%;
  z-index: 1;
  background-color: #4e4a42;
  padding: 5rem;
  flex-direction: column;
  font-size: 14px;
  gap: 3rem;
  align-items: center;
  width: 100%;
  left: 0;
  //   height: 100vw;
  transform: translateX(-100%);
  transition: all 0.5s ease-in-out;

  @include desktop {
    display: none;
  }
}
.img-user {
  display: flex;
  gap: 2rem;
  align-items: center;
  margin-left: auto;

  @include desktop {
    margin: 0;
  }
  .user {
    color: white;
    display: flex;
    gap: 1rem;
    align-items: center;
    img {
      // display: none;
      border-radius: 5rem;
      width: 1.6rem;
      height: 1.6rem;
    }
    button {
      display: none;
      font-size: 14px;
      width: 4rem;
      height: 1.6rem;
      border: none;
      border-radius: 0.2rem;
      color: white;
      background-color: $button-color;

      @include desktop {
        display: block;
      }
    }
    a {
      text-decoration: none;
    }
  }
}
.user_info {
  display: flex;
  gap: 0.5rem;
  align-items: center;

  p {
    font-size: 12px;
    color: white;
  }
}

.drop {
  width: 2rem;
}
.loginMobile {
  font-size: 14px;
  width: 4rem;
  height: 1.6rem;
  border: none;
  border-radius: 0.2rem;
  color: white;
  background-color: $button-color;
}
.router-link-active {
  color: $button-color;
  border-bottom: solid 2px white;
}

.cart {
  // transition: all 0.5s ease;
  button {
    display: block;
  }
  img {
    width: 1.6rem;
    height: 1.6rem;
  }
}
.admin {
  display: none;
  width: 1rem;

  @include desktop {
    display: block;
  }
}
</style>
