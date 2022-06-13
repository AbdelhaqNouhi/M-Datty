<script setup>
import axios from 'axios';
import { onMounted } from 'vue';
import NavAdmin from './NavAdmin.vue'


const Box = ref([]);

const GetCommande = async function () {
    const res = await axios.get('http://localhost/api/GetCommande');
    const data = await res.data;
    if (data) {
        Box.value = data;
    } else {
        console.log("error");
    }
}

onMounted (() => {
    GetCommande();
});

</script>

<template>
<NavAdmin />
    <div class="product">
        <table border="1px solid black">
            <tr class="title">
                <th>Image</th>
                <th>Nome</th>
                <th>Descriptions</th>
                <th>Prix</th>
                <th>Id</th>
                <th>User_id</th>
                <th>More</th>
            </tr>
            <tr v-for="box in Box" :key="i" class="list">
                <td class="img"><img :src="box.image" alt=""></td>
                <td>{{box.name}}</td>
                <td>{{box.description}}</td>
                <td>{{box.price}}</td>
                <td>{{box.product_id}}</td>

                 <td>
                    <a data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-three-dots point" viewBox="0 0 16 16">
                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                    </a>
                    <ul class="dropdown-menu">
                        <button class="dropdown-item" name="delete">Delete</button>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</template>

<style lang="scss" scoped>
@import "../assets/Scss/variable";
@import "../assets/Scss/media";

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

tr,th {
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
</style>