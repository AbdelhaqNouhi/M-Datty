<script setup>

</script>

<template>
    <div class="first">
        <img src="../../assets/images/background.png" alt="" />
        <div class="bg-opacity"></div>
        <div class="content">
            <div>
                <h1>MaisonDatty</h1>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur</p>
                <!-- <p>UN DÉLICE POUR LES PAPILLES</p> -->
            </div>
            <div>
                <button>Acheter en ligne</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";

.first {
    padding: 4rem 0;
    width: 100%;
    color: white;
    @include desktop {
        height: 100vh;
    }
    .bg-opacity{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: black;
        opacity: 0.3;
        height: 60%;

        @include desktop {
            height: 100%;
        }
    }

    img {
        object-fit: cover;
        position: absolute;
        width: 100%;
        height: 60%;

        @include desktop {
            height: 100%;
        }
    }
}
.content{
    padding: 3rem;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    p {
        text-align: center;
        padding: 2rem 0;
        font-size: 18px;
    }

    @include desktop {
        padding: 8rem 5rem;
        align-items: baseline;
    }

    button {
        color: white;
        background-color: var(--corvid-background-color,rgba(var(--bg,var(--color_17)),var(--alpha-bg,1)));
        border: solid 2px white;
        border-radius: 0.3rem ;
        width: 10rem;
        height: 2.5rem;
    }
}
</style>