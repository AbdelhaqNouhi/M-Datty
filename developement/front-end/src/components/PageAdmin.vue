<script>
    export default {
        name: "PageAdmin",
    }
</script>

<template>
    <div class="nav">
        <div class="username">
            <img src="../assets/images/pexels-eberhard-grossgasteiger-572897.jpg" alt="...">
            <h1>Abdelhaq Nouhi</h1>
        </div>
        <div class="button">
            <button>Ajoute Produit</button>
        </div>
    </div>
    <div class="product">
        <table border="1px solid black">
            <tr class="title">
                <th>Image</th>
                <th>Nome</th>
                <th>Descriptions</th>
                <th>Prix</th>
                <th>Id</th>
                <th>More</th>
            </tr>
            <tr class="list">
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <th>aaaaaaa</th>
            </tr>
        </table>
    </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

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

        button {
            padding: 0.4rem;
            border: none;
            border-radius: 0.2rem;
            color: white;
            background-color: $button-color;
        }
    }
}

.product {
    display: flex;
    flex-direction: column;
    margin: 2rem;
    border-radius: 5rem;
}
table {
    width: 100%;
    border-collapse: collapse;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 1rem;
}

tr {
    background-color: $secondary-bg-color;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>