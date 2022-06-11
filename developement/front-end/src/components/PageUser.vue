<script setup>

</script>

<template>
    <div class="PageUser">
        <div class="info">
            <h1>personal info</h1>
            <div class="username">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenome" placeholder="Prenom">
            </div>
            <div class="social">
                <input type="email" name="email" placeholder="E-mail">
                <input type="tel" name="phone" placeholder="Phone">
            </div>
        </div>
        <div class="adress">
            <h1>Adresse</h1>
            <div class="city">
                <input type="text" name="rue" placeholder="Rue">
                <input type="text" name="ville" placeholder="Ville">
            </div>
            <div class="pays">
                <input type="text" name="code" placeholder="Code postal">
                <input type="text" name="pays" placeholder="Pays">
            </div>
        </div>
        <div class="button">
            <button class="cancel">Cancel</button>
            <button class="save">Save change</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

.PageUser {
    margin: 1rem;
    padding: 2rem 1rem;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 4rem;
    background-color: $secondary-bg-color;
    border: none;
    border-radius: 0.5rem;

    @include desktop {
        margin: 5rem;
        padding: 2rem 4rem; 
    }

    @include lg-desktop {
        padding: 2rem 8rem;
        
    }
}
.info {
    display: flex;
    flex-direction: column;
    gap: 2rem;

    h1 {
        font-weight: normal;
    }

   .username {
        // width: 100%;
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 8rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 10rem;
        }

        input {
            width: 100%;
            border-radius: 0.2rem;
            border: none;
            padding: 0.8rem;
        }
    }
    .social {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 8rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 10rem;
        }

        input {
            width: 100%;
            border-radius: 0.2rem;
            border: none;
            padding: 0.8rem;
        }
    }
}
.adress {
    display: flex;
    flex-direction: column;
    gap: 2rem;

    h1 {
        font-weight: normal;
    }

    .city {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 8rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 10rem;
        }
        

        input {
            width: 100%;
            border-radius: 0.2rem;
            border: none;
            padding: 0.8rem;
        }
    }
    .pays {
        display: flex;
        flex-direction: column;
        gap: 2rem;

        @include desktop {
            display: flex;
            flex-direction: row;
            gap: 8rem;
        }
        @include lg-desktop {
            display: flex;
            flex-direction: row;
            gap: 10rem;
        }

        input {
            width: 100%;
            border-radius: 0.2rem;
            border: none;
            padding: 0.8rem;
        }
    }
}
.button {
    width: 100%;
    display: flex;
    justify-content: space-between;

    @include desktop {
        margin-left: auto;
        gap: 1rem;
    }
    @include lg-desktop {
        width: 42%;
        margin-left: auto;
        gap: 10rem;
    }

    .cancel{
        width: 6rem;
        border-radius: 0.2rem;
        padding: 0.6rem;
        background-color: var(--corvid-background-color,rgba(var(--bg,var(--color_17)),var(--alpha-bg,1)));

    }
    .save{
        width: 12rem;
        border: none;
        border-radius: 0.2rem;
        padding: 0.6rem;
        background-color: $header-color;
        color: white;
    }
}
</style>