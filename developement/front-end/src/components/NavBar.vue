<script>
export default {
  name: "NavBar",
  data() {
    return {
      menuIcon: "close",
    };
  },
  methods: {
    openMenu() {
      if (this.menuIcon == "close") {
        this.menuIcon = "open";
      } else {
        this.menuIcon = "close";
      }
    },
  },
};
</script>

<template>
  <div>
    <!-- <div class="piblisite">
        <p>​En ce moment, livraison par coursier ( sur Toulouse et banlieue) offerte dès 29€ d'achat !</p>
    </div> -->
    <header class="navbar">
      <div class="logo">
        <img alt="Vue logo" class="logo" src="../assets/images/logo 2.png" />
      </div>
      <nav class="menu">
        <Router-Link to="/">Home</Router-Link>
        <Router-Link to="/Boutique">Boutique</Router-Link>
        <Router-Link to="/PageUser">PageUser</Router-Link>
        <a href="#Contact">Contact</a>
      </nav>
      <nav :class="menuIcon">
        <Router-Link to="/">Home</Router-Link>
        <Router-Link to="/Boutique">Boutique</Router-Link>
        <a href="#Contact">Contact</a>
        <Router-Link to="/Login"
          ><button class="loginMobile">Login</button></Router-Link
        >
      </nav>
      <div class="img-user">
        <img src="../assets/images/pexels-brett-jordan-9074993.jpg" alt="" />
        <Router-Link to="/Login"
          ><button class="login">Login</button></Router-Link
        >
      </div>
      <button @click="openMenu">
        <img src="../assets/images/menu.svg" alt="" />
      </button>
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
  gap: 1rem;
  align-items: center;
  img {
    display: none;
    border-radius: 5rem;
    width: 1.6rem;
    height: 1.6rem;

    @include desktop {
      display: block;
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
</style>
