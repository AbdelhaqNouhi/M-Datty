<script>
    export default {
        name: "FirsPart",
    }
</script>

<template>
    <div class="first">
        <img src="../../assets/images/aboutus.jpg" alt="" />
        <div class="content">
            <div>
                <h1>MaisonDatty</h1>
            </div>
            <div>
                <p>UN DÉLICE POUR LES PAPILLES -</p>
            </div>
            <div>
                <button>Button</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";

.first {
    width: 100%;
    height: 88vh;
    color: white;

    img {
        object-fit: cover;
        position: absolute;
        width: 100%;
        height: 88vh;
    }
}
.content{
    padding: 5rem;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    p {
        padding: 3rem 0;
    }

    button {
        font-weight: bold;
        color: white;
        background-color: var(--corvid-background-color,rgba(var(--bg,var(--color_17)),var(--alpha-bg,1)));
        border: solid 2px white;
        border-radius: 0.6rem ;
        width: 10rem;
        height: 2.5rem;
    }
}
</style>