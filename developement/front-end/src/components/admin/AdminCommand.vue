<script setup>
import NavAdmin from "../admin/NavAdmin.vue";
import axios from "axios";
import { ref, onMounted } from "vue";
import { useStore } from "../../stores/counter";

const store = useStore();
const user = store.user;
const items = ref([]);

const GetCommande = async function () {
  const res = await axios.get('http://localhost/api/GetCommande');
  const data = await res.data;
  if (data) {
    items.value = data;
  } else {
      console.log("error");
  }
};

const DeleteCommande = async function (id) {
  const res = await axios.post('http://localhost/api/DeleteCommande', {id});
  const data = await res.data;
  if (data) {
    GetCommande();
    alert("Delete Commande Successfully");
  } else {
      console.log("error");
  }
};


onMounted (() => {
    if(user.role !== 'admin') {
      router.push('/')
    }
    GetCommande();
});
</script>

<template>
<div class="all"><div class="rr"></div>
    <NavAdmin />
    <div class="product">
      <p>Commandes</p>
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
                    @click="DeleteCommande(item.commande_id)"
                >
                    Delete
                </button>
                </ul>
            </td>
        </tr>
    </table>
    </div>
</div>
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
