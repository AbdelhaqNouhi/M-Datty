<script>
export default {
  name: "Footer",
};
</script>

<template>
  <div class="footer">
    <div class="logo">
      <img src="../assets/images/logo 2.png" alt="" />
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
        <a href="">aaaaa</a>
        <a href="">aaaaa</a>
        <a href="">aaaaa</a>
      </div>
    </div>
    <div class="social">
      <label>Social</label>
      <div class="a">
        <a href=""><img src="../assets/images/footer/instagram.svg" alt=""/></a>
        <a href=""><img src="../assets/images/footer/facebook.svg" alt="" /></a>
        <a href=""><img src="../assets/images/footer/twiter.svg" alt="" /></a>
      </div>
      <div class="admin">
        <Router-link to="LoginAdmin"><img src="../assets/images/login-admin.svg" alt=""/></Router-link>
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
    flex-direction: column;
    gap: 4rem;
    align-items: center;
    width: 100%;
    height: 100%;
    background-color: $header-color;

  @include desktop {
    padding: 1rem 5rem;
    height: 14rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
}
.group {
  display: flex;
  gap: 12rem;

  label {
    font-weight: bold;
  }

  .links {
    display: flex;
    gap: 1rem;
    flex-direction: column;
    align-items: center;

    a {
      text-decoration: none;
      color: $button-color;
    }
  }

  .service {
    display: flex;
    gap: 1rem;
    flex-direction: column;
    align-items: center;

    a {
      text-decoration: none;
      color: $button-color;
    }
  }
}

.social {
  display: flex;
  gap: 20rem;
  flex-direction: column;
  align-items: center;


  @include desktop {
      gap: 2rem;
  }

  label {
      display: none;

      @include desktop {
        display: block;
      }
  }

  .a {
    display: flex;
    gap: 8rem;
    align-items: center;

    @include desktop {
        gap: 2rem;
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
