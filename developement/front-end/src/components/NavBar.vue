<script setup>
import { useStore } from "@/stores/counter";
import {useRouter} from 'vue-router';
import { ref } from 'vue';


const store = useStore();
const Panier = store.Panier;
const showPanier = store.showPanier;
const setUser = store.setUser;
const cont = store.counter;
const user = store.user;


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
    } else {
      aa.value;
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
          src="@/assets/images/icone/logo2.png"
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
          <p v-if="user">{{cont.length}}</p>
          <img src="@/assets/images/icone/ShoppingCart.svg" alt=""/>
        </div>
        <div class="user">
          <div v-if="store.user" class="user_info">
            <img src="@/assets/images/aboutus.jpg" alt="" />
            <p>{{store.user?.first_name ?? ""}}</p>
          </div>
          <Router-Link to="/Login"><button v-if="!store.user" class="login">Login</button></Router-Link>
          <button v-if="store.user" @click="logout" class="login">Log Out</button>
        </div>
      </div>
      <!-- <div class="mune-close"> -->
      <button v-if="check" @click="openMenu">
        <img src="@/assets/images/icone/menu.svg" alt="" />
      </button>
      <button v-if="!check" @click="closeMenu">
        <img class="drop" src="@/assets/images/icone/close.svg" alt="" />
      </button>
      <!-- </div> -->
    </header>
  </div>
</template>

<style lang="scss" scoped>
@import "@/assets/Scss/variable";
@import "@/assets/Scss/media";

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
    width: 6rem;
    height: 1.6rem;
    color: white;
    background-color: #D4C7A0;
    border: none;
    border-radius: 0.2rem;
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
      border-radius: 5rem;
      border: 2px solid white;
      width: 1.3rem;
      height: 1.3rem;
      
      @include desktop {
        width: 1.6rem;
        height: 1.6rem;
      }
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
  // display: flex;
  color: white;

    p {
        position: absolute;
        margin-left: 1rem;
        margin-top: -1rem;
        background-color: #D4C7A0;
        border-radius: 100%;
        width: 1.2rem;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
      }
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
