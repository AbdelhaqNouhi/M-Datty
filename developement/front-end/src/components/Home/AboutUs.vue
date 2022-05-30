<script>
    export default {
        name: "AboutUs",
    }
</script>

<template>
<div class="aboutus">
    <div class="about">
        <div class="img">
            <img src="../../assets/images/aboutus.jpg" alt="">
        </div>
        <div class="para">
            <div class="title">
                <p>À PROPOS</p>
                <p>MAISON DATTY</p>
            </div>
            <div class="text">
                <p>Maison Datty est une aventure artisanale menée par des passionnés de la
                    confiserie ayant une profonde conviction des bienfaits des dattes.</p>
                <p>Notre mission est de vous faire profiter des bienfaits et vertus exceptionnelles
                    des dattes qui changeront complètement votre façon de percevoir
                    et consommer ces succulents petits fruits.</p>
                <p>Chaque recette est pensée pour ravir vos papilles grâce à un délicieux mariage 
                    de textures et saveurs, des produits de qualité et un savoir-faire français unique</p>
                <p>Entre gourmandise, originalité et bienfaits santé, en plus d’être délicieuses, nos 
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
        padding: 1rem;
        align-items: center;
        display: flex;
        flex-direction: column;
        border-radius: 0.5rem;
        background-color: $secondary-bg-color;
        margin: 0 1rem;
        

        @include desktop {
            padding: 1rem;
            margin: 5rem 8rem;
            display: flex;
            flex-direction: row;
            gap: 2rem;
        }
    }

.img {
    width: 100%;
    height: 100%;

     @include tablet {
            width: 100%;
            height: 100%;
        }

    @include desktop {
        // width: 600px;
        height: 400px;
    }
    
    img {
        width: 100%;

       
        @include desktop {
            height: 100%;
        }
    }
}
    .para {
        flex-direction: column;
        display: flex;
        align-items: center;

        .title {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            color: $button-color;
            text-align: center;

            @include tablet {
                gap: 1rem;
            }

            @include desktop {
                gap: 1rem;
                padding: 1rem;
            }
        }

        .text {
            font-size: 12px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 2rem;
            

            @include desktop {
                font-size: 13px;
                padding: 2rem;
            }

            @include lg-desktop {
                font-size: 15px;
                padding: 1rem;
            }
        }
    }
</style>