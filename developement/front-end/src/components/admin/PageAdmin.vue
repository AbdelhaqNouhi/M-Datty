<script setup>
import axios from "axios";
import NavAdmin from "../admin/NavAdmin.vue";
import {ref, onMounted} from 'vue'
import { useStore } from "../../stores/counter";
import router from "../../router";

const store = useStore();
const user = store.user;


const Box = ref([]);
const Update = ref([]);
const image = ref('');
const name = ref('');
const description = ref('');
const price = ref('');

const selectimageAdd = function (event) {
  image.value = event.target.files[0];
}
const AddProduct = function () {
  const formData = new FormData();
  formData.append("name", name.value);
  formData.append("description", description.value);
  formData.append("price", price.value);
  formData.append("image", image.value);

  axios.post("http://localhost/api/AddProduct", formData,{
  })
      .then((response) => {
        GetProduct();
      })
  }

const GetProduct = function() {
      axios.get("http://localhost/api/GetProduct")
      .then((response) => {
        Box.value = response.data;
      });
  }

const DeleteProduct = function (id) {
  console.log(id);
  const product_id = id;
  axios.post("ttp://localhost/api/DeleteProduct" + product_id)
    .then((response) => {
      GetProduct();
    })
}
const FindProduct = function (id) {
  const product = Box.value.find((e) => e.product_id == id);
  Update.value = product;
}
const selectimageUpdate = function (event) {
  Update.value.image = event.target.files[0];
}

const UpdateProduct = function () {
  const formData = new FormData();
  formData.append("image", Update.image);
  formData.append("name", Update.name);
  formData.append("description", Update.description);
  formData.append("price", Update.price);
  formData.append("product_id", Update.product_id);

  axios.post("http://localhost/api/UpdateProduct", formData)
  .then((response) => {
    GetProduct();
  })

}

  onMounted (() => {
      if(user.role !== 'admin') {
        router.push('/')
      }
      GetProduct();
  });

</script>

<template>
    <NavAdmin />
  <div class="all"><div class="rr"></div>
    <div class="product">
      <p>Produits</p>
      <table border="1px solid black">
        <tr class="title">
          <th>Image</th>
          <th>Nome</th>
          <th>Descriptions</th>
          <th>Prix</th>
          <th>Id</th>
          <th>More</th>
        </tr>
        <tr v-for="box in Box" :key="i" class="list">
          <td class="img"><img :src="`http://localhost/uploads/` + box.image" alt="" /></td>
          <td>{{ box.name }}</td>
          <td>{{ box.description }}</td>
          <td>{{ box.price }}</td>
          <td>{{ box.product_id }}</td>
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
                @click="DeleteProduct(box.product_id)"
              >
                Delete
              </button>
              <button
                @click="FindProduct(box.product_id)"
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
  <form @submit.prevent="UpdateProduct">
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
            <input type="file" id="pic-update" name="image" hidden @change="selectimageUpdate" />
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="nome"
              placeholder="Nome"
              v-model="Update.name"
            />
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="description"
              placeholder="descriptions"
              v-model="Update.description"
            />
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="prix"
              placeholder="Prix"
              v-model="Update.price"
            />
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
      class="modal"
      id="staticBackdrops"
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
            <input type="file" id="pic-add" name="image" hidden @change="selectimageAdd" />
            <!-- <input type="text" name="image" placeholder="Image" v-model="this.Product.image"> -->
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="nome"
              placeholder="Nome"
              v-model="name.value"
            />
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="description"
              placeholder="descriptions"
              v-model="description.value"
            />
          </div>
          <div class="modal-body">
            <input
              type="text"
              name="prix"
              placeholder="Prix"
              v-model="price.value"
            />
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
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";
.all {
  display: flex;
}
.rr {
  width: 20%;
}
p {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  color: $button-color;
}
.product {
  // position: absolute;
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
  padding: 4rem 0;
  margin: auto;
  max-width: 550px;
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