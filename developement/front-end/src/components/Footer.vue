<script setup>

</script>

<template>
  <div class="footer">
    <div class="logo">
      <img src="@/assets/images/icone/logo.png" alt="" />
      <div class="paiment">
        <img src='@/assets/images/footer/Visa.png' alt="">
        <img src="@/assets/images/footer/MasterCard.png" alt="">
        <img src="@/assets/images/footer/PayPal.png" alt="">
      </div>
    </div>
    <div class="group">
      <div class="links">
        <label>Company</label>
        <Router-Link to="/">Home</Router-Link>
        <a href="/#about">AboutUs</a>
        <a href="/#Contact">Contact</a>
      </div>
      <div class="service">
        <label>Service</label>
        <a href="">Paiement</a>
        <a href="">Livraison</a>
        <a href="">Client</a>
      </div>
    </div>
      <div class="adress">
          <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
        <div class="a">
          <a href=""><img src="../assets/images/footer/instagram.svg" alt=""/></a>
          <a href=""><img src="../assets/images/footer/facebook.svg" alt="" /></a>
          <a href=""><img src="../assets/images/footer/twiter.svg" alt="" /></a>
        </div>
      </div>
  </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.footer {
    padding: 2rem;
    color: white;
    display: flex;
    gap: 4rem;
    flex-direction: column;
    width: 100%;
    height: 100%;
    background-color: $header-color;

  @include desktop {
    padding: 2rem 5rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
}

.logo {
  display: flex;
  justify-content: space-between;


  @include desktop {
    flex-direction: column;
    gap: 4rem;
  }

   img {
    width: 8rem;

    @include desktop {
      width:10rem;
    }
  }
}
    .paiment {
      align-items: center;
      display: flex;
      gap: 1.5rem;

      @include desktop {
        }

      img {
        height: 1rem;
        width: 2rem;
      }
    }
.group {
  display: flex;
  justify-content: space-around;


  @include desktop {
    align-items: center;
    gap: 17rem;
  }

  label {
    font-weight: bold;
  }

  .links {
    display: flex;
    gap: 1rem;
    flex-direction: column;

    a {
      text-decoration: none;
      color: $button-color;
      }

      a:hover {
        color: white;
    }
  }

  .service {
    display: flex;
    gap: 1rem;
    flex-direction: column;

    a {
      text-decoration: none;
      color: $button-color;
    }
  }
}

.adress {
  display: flex;
  flex-direction: column;
  gap: 3.5rem;
  align-items: center;


  @include desktop {
    text-align: center;  
    align-items: center;
    width: 10rem;
  }

    p {
      font-size: 12px;
    }

  .a {
    display: flex;
    gap: 8rem;

    @include desktop {
        gap: 2.5rem;
    }
  }

  .admin {
    margin-left: auto;
    display: none;
    width: 16px;

    @include desktop {
      display: block;
    }
  }
}
</style>
