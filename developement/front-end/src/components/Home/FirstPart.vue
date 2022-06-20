<script setup>

</script>

<template>
    <div class="first">
        <img src="../../assets/images/background.jpg" alt="" />
        <div class="bg-opacity"></div>
        <div class="content">
            <div>
                <h1>MaisonDatty</h1>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br/> Dicta voluptates dolor repellat voluptatibus nemo.</p>
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

.first {
    width: 100%;
    height: 100vh;
    color: white;
    .bg-opacity{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.3;
    }

    img {
        object-fit: cover;
        position: absolute;
        width: 100%;
        height: 100%;
    }
}
.content{
    padding: 12rem 5rem;
    position: relative;
    display: flex;
    flex-direction: column;
    // align-items: center;
    p {
        padding: 2rem 0;
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