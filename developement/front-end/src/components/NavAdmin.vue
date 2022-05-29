<script>
export default {
    name: "NavAdmin",
}
</script>

<template>
      <div class="nav">
        <div class="username">
            <img src="../assets/images/pexels-eberhard-grossgasteiger-572897.jpg" alt="...">
            <h1>Abdelhaq Nouhi</h1>
        </div>
        <div class="button">
            <div class="add">
                <Router-Link to="/PageAdmin">Produits</Router-Link>
                <Router-Link to="/Command">Commande</Router-Link>
                <button class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajoute Produit</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";


.router-link-active {
  color: $button-color;
  border-bottom: solid 2px white;
}
.nav {
    align-items: center;
    display: flex;
    justify-content: space-between;
    background-color: $header-color;
    padding: 1rem;
    margin: 2rem;
    border-radius: 0.5rem;

    .username {
        align-items: center;
        display: flex;
        gap: 1rem;
        img {
            width: 2rem;
            height: 2rem;
            border-radius: 4rem;
        }
        h1 {
            color: white;
            font-size: 14px;
            font-weight: normal;
        }
    }

    .button {
        display: flex;
        gap: 8rem;

    }

    .add {
        align-items: center;
        display: flex;
        gap: 5rem;
        button {
            padding: 0.4rem;
            border: none;
            border-radius: 0.2rem;
            color: white;
            background-color: $button-color;
        }
        a {
            color: white;
            text-decoration: none;
        }
    }
}
</style>