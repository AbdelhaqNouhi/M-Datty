<script>
    export default {
        name: "FirsPart",
    }
</script>

<template>
    <div class="first">
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
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";

*{
    font-family: $fonts;
}
.first {
    color: white;
    background-image: url(https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg);
    height: 30rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 4rem 0;

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