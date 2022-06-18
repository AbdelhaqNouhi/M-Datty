<script setup>
import NavAdmin from "./NavAdmin.vue";
import axios from "axios";
import { ref, onMounted } from "vue";

const items = ref([]);

const GetCommande = async function () {
const res = await axios.get("http://localhost/api/GetCommande");
const data = await res.data;
if (data) {
    items.value = data;
    // console.log(items.value);
} else {
    console.log("error");
}
};

onMounted(() => {
GetCommande();
});
</script>

<template>
<div class="all">
    <NavAdmin />
    <div class="product">
    <table border="1px solid black">
        <tr class="title">
            <th>product_name</th>
            <th>user_name</th>
            <th>phone</th>
            <th>ville</th>
            <th>adress</th>
            <th>quantite</th>
            <th>total_prix</th>
            <th>More</th>
        </tr>
        <tr v-for="item in items" :key="i" class="list">
            <td>{{item.product_name}}</td>
            <td>{{item.user_name}}</td>
            <td>{{item.phone}}</td>
            <td>{{item.ville}}</td>
            <td>{{item.adress}}</td>
            <td>{{item.quantite}}</td>
            <td>{{item.total_prix}}</td>
            <td>
                <a data-bs-toggle="dropdown">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="bi bi-three-dots point"
                    viewBox="0 0 16 16"
                >
                    <path
                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"
                    />
                </svg>
                </a>
                <ul class="dropdown-menu">
                <button
                    class="dropdown-item"
                    name="delete"
                    @click="DeleteProduct()"
                >
                    Delete
                </button>
                <button
                    @click="FindProduct()"
                    class="dropdown-item"
                    name="update"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrops"
                >
                    Update
                </button>
                </ul>
            </td>
        </tr>
    </table>
    </div>
</div>
<form @submit.prevent="UpdateProduct()">
    <div
    class="modal fade"
    id="staticBackdrops"
    data-bs-backdrop="static"
    aria-labelledby="staticBackdropLabel"
    >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="staticBackdropLabel">Update Produit</h2>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
            <label for="pic-update">choice image</label>
            <input
            type="file"
            id="pic-update"
            name="image"
            hidden
            @change="selectimageUpdate"
            />
        </div>
        <div class="modal-body">
            <input type="text" name="nome" placeholder="Nome" />
        </div>
        <div class="modal-body">
            <input type="text" name="description" placeholder="descriptions" />
        </div>
        <div class="modal-body">
            <input type="text" name="prix" placeholder="Prix" />
        </div>
        <div class="modal-footer">
            <input
            class="btn w-100"
            type="Submit"
            name="update"
            value="Update"
            data-bs-dismiss="modal"
            />
        </div>
        </div>
    </div>
</div>
</form>
<!-- ---------------------Add------------------------ -->
<form @submit.prevent="AddProduct">
    <div
    class="modal fade"
    id="staticBackdrop"
    data-bs-backdrop="static"
    aria-labelledby="staticBackdropLabel"
    >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="staticBackdropLabel">Add Produit</h2>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
            <label for="pic-add">choice image</label>
            <input
            type="file"
            id="pic-add"
            name="image"
            hidden
            @change="selectimageAdd"
            />
            <!-- <input type="text" name="image" placeholder="Image" v-model="this.Product.image"> -->
        </div>
        <div class="modal-body">
            <input type="text" name="nome" placeholder="Nome" />
        </div>
        <div class="modal-body">
            <input type="text" name="description" placeholder="descriptions" />
        </div>
        <div class="modal-body">
            <input type="text" name="prix" placeholder="Prix" />
        </div>
        <div class="modal-footer">
            <input
            class="btn w-100"
            type="Submit"
            name="add"
            value="Add"
            data-bs-dismiss="modal"
            />
        </div>
        </div>
    </div>
    </div>
</form>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";
.all {
  display: flex;
}
.product {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin: 4rem;
  border-radius: 5rem;
}
table {
  width: 100%;
  border-collapse: collapse;
}
td,
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding-left: 1rem;

  img {
    width: 120px;
    height: 100px;
  }
}

th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 1rem;
}

tr,
th {
  background-color: $secondary-bg-color;
}

td:last-child {
  width: 2rem;
  height: 2rem;
  padding: 1rem;

  ul {
    padding: 0.5rem;
  }
  button {
    padding: 0.5rem;
  }
}
.modal-dialog {
  padding: 1rem;
  margin: auto;
}
.modal-content {
  background-color: #d1d5db;
  padding: 0rem 1rem 1rem 1rem;
  margin: auto;
}
.modal-header {
  background-color: #d1d5db;
  padding: 1rem 0rem;
}
.modal-body {
  text-align: center;
  padding: 1rem 0;

  label {
    background-color: white;
    text-align: center;
    padding: 0.5rem;
    width: 100%;
    border-radius: 0.3;
    // color: white;
  }

  input {
    width: 100%;
    padding: 0.5rem;
    border-radius: 0.3rem;
    border: 1px solid #ffffff;
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
