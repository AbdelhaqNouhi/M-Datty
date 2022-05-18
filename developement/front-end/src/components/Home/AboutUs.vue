<script>
    export default {
        name: "AboutUs",
    }
</script>

<template>
<div class="aboutus">
    <div class="about">
        <div class="img">
            <img src="../../assets/images/img_about.svg" alt="">
        </div>
        <div class="para">
            <div class="title">
                <p>À PROPOS</p>
                <p>MAISON DATTY</p>
            </div>
            <div class="text">
                <p>Maison Datty est une aventure artisanale menée par des passionnés de la <br>
                    confiserie ayant une profonde conviction des bienfaits des dattes.</p>
                <p>Notre mission est de vous faire profiter des bienfaits et vertus exceptionnelles <br>
                    des dattes qui changeront complètement votre façon de percevoir<br>
                    et consommer ces succulents petits fruits.</p>
                <p>Chaque recette est pensée pour ravir vos papilles grâce à un délicieux mariage <br>
                    de textures et saveurs, des produits de qualité et un savoir-faire français unique</p>
                <p>Entre gourmandise, originalité et bienfaits santé, en plus d’être délicieuses, nos <br>
                    Dattys sont un réel petit bijou nutritif.</p>
            </div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";

    .about {
        display: flex;
        flex-direction: column;
        border-radius: 0.5rem;
        background-color: $secondary-bg-color;
        margin: 0 1rem;


        @include desktop {
            margin: 0 8rem;
            display: flex;
            flex-direction: row;
            gap: 2rem;
            gap: 5rem;
        }
    }

.img {
    img {
        width: 100%;
        height: 100%;
    }
}
    .para {
        flex-direction: column;
        display: flex;
        align-items: center;

        .title {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding: 2rem;
            color: $button-color;
            text-align: center;
        }

        .text {
            font-size: 14px;
            display: flex;
            flex-direction: column;
            gap: 3rem;
            padding: 2rem;
            
            @include desktop {
                font-size: 16px;
            }
        }
    }
</style>