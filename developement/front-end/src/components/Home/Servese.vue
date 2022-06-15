<script setup>
   
</script>


<template>
<div class="all">
    <div class="our">
        <h1>Our Services</h1>
    </div>
    <div class="servese">
        <div class="icone">
            <div>
                <img src="@/assets/images/service/Paiement-sécurisé.svg" alt="">
            </div>
            <div>
                <h4>Paiement sécurisé</h4>
            </div>
            <div>
                <p>Paypal, Carte Bleue</p>
            </div>
        </div>
        <div class="icone">
            <div>
                <img src="@/assets/images/service/Service-Client.svg" alt="">
            </div>
            <div>
                <h4>Service Client</h4>
            </div>
            <div>
                <p>Lundi au vendredi de 9h00 à 18h00</p>
            </div>
        </div>
        <div class="icone">
            <div>
                <img src="@/assets/images/service/Livraison-à-domicile.svg" alt="">
            </div>
            <div>
                <h4>Livraison à domicile</h4>
            </div>
            <div class="domicile">
                <p> En France métropolitaine </p>
            </div>
        </div>
         <div class="icone">
             <div>
                 <img src="@/assets/images/service/Livraison-par-coursier.svg" alt="">
            </div>
            <div>
                <h4>Livraison par coursier</h4>
            </div>
            <div>
                <p>Uniquement sur Toulouse <br> Et banlieue</p>
            </div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "@/assets/Scss/variable";
@import "@/assets/Scss/media";

.all {
    margin: 2.5rem auto;

    @include desktop {
        margin: 2rem 8rem;
    }
}
.servese {
    display: flex;
    flex-direction: column;
    gap: 4rem;

    @include desktop {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
}
.our {
    font-size: 12px;
    padding: 4rem 0;
    display: flex;
    justify-content: center;

    @include desktop {
        padding: 4rem 0;
    }
}
.icone {
    text-align: center;
    // width: 8rem;

    h4 {
        font-size: 18px;
    }
}

</style>