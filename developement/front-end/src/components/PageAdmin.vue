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
            <button class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajoute Produit</button>
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
                 <td>
                    <a data-bs-toggle="dropdown"
                                    ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="bi bi-three-dots point"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"
                                        /></svg
                                ></a>

                                <ul class="dropdown-menu">
                                    <button class="dropdown-item" name="delete">Delete</button>
                                    <button class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrops">Update</button>
                                </ul>
                </td>
            </tr>
        </table>
    </div>
            <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLabel">Update Produit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <input type="text" name="image" placeholder="Image">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="description" placeholder="descriptions">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="prix" placeholder="Prix">
                    </div>
                    <div class="modal-footer">
                        <input class="btn w-100" type="Submit" name="update" value="Update" data-bs-dismiss="modal">
                    </div>
            </div>
            </div>
            </div>
            <!-- --------------------------------------------- -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLabel">Add Produit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <input type="text" name="image" placeholder="Image">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="description" placeholder="descriptions">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="prix" placeholder="Prix">
                    </div>
                    <div class="modal-footer">
                        <input class="btn w-100" type="Submit" name="add" value="Add" data-bs-dismiss="modal">
                    </div>
            </div>
            </div>
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
td:last-child {
    width: 2rem;
    height: 2rem;

    ul {
        padding: 0.5rem;
    }
    button {
        padding: 0.5rem;
    }
}
.modal-dialog{
    padding: 1rem;
    margin: auto;
}
.modal-content{
    background-color: #D1D5DB;
    padding: 0rem 1rem 1rem 1rem;
    margin: auto;
}
.modal-header{
    background-color: #D1D5DB;
    padding: 1rem 0rem;
}
.modal-body {
    padding: 1rem 0;

    input {
        padding: 0.5rem;
        border-radius: 0.2rem;
        border: 1px solid #dddddd;
        width: 100%;
    }
}
.modal-footer {
    padding: 1rem 0;
    border: none;
    border-radius: 0.2rem;

    input {
        color: white;
        padding: 0.5rem;
        background-color: $header-color;
    }
}
</style>