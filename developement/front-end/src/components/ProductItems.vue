<script>
export default {
    name: "ProductItems",
}
</script>

<template>
    <div class="parent">
       <div class="product">
            <div class="img">
                <img src="../assets/images/aboutus.jpg" alt="">
            </div>
            <div class="info">
                <div class="name">
                    <h3>name</h3>
                </div>
                <div class="descriptions">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem impedit obcaecati, deserunt maiores reprehenderit recusandae.</p>
                </div>
                <div class="price">
                    <h3>price</h3>
                </div>
                <div class="button">
                    <button>add to card</button>
                </div>
            </div>
       </div>
    </div>
</template>

<style lang="scss" scoped>
@import '../assets/Scss/variable';
@import '../assets/Scss/media';

.parent {
    padding: 4rem 18rem;
}

.product{
    padding: 2rem;
    background-color: $secondary-bg-color;
    border-radius: 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 4rem;

    .img {
        width: 50%;
        // height: 50%;
        position: relative;
        text-align: center;
        color: white;
        img {   
            width: 100%;
            height: 100%;
            border-radius: 0.3rem;
        }
    }

    .info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        
        // .name {

        // }

        .descriptions {
            width: 20rem;
            flex-wrap: wrap;
        }

        // .price {

        // }

        .button {
            width: 15rem;
            button {
                width: 100%;
                height: 2.5rem;
                background-color: $header-color;
                color: white;
                border: none;
                border-radius: 0.3rem;
                font-size: 16px;
                // cursor: pointer;
            }
        }
    }
}
</style>
