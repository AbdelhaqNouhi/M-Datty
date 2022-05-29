<script>
import NavAdmin from './NavAdmin.vue';
    export default {
        name: "PageAdmin",

        data () {
            return {
                Box: [],
                Update: [],
                Product: {
                    image: null,
                    name: "",
                    description: "",
                    price: "",
                }
            }
        },

        components: {
            NavAdmin
        },

        methods: {
            selectimage (event) {
                this.Product.image = event.target.files[0];
                console.log(this.Product.image);
            },
            // -----------------------------------
            async AddProduct () {
                const res = await fetch ('http://localhost:8000/api/AddProduct',{
                    method: 'POST',
                    body: JSON.stringify({
                        image: this.Product.image,
                        name: this.Product.name,
                        description: this.Product.description,
                        price: this.Product.price,
                }),
            });
                const data = await res.json();
                if (data) {
                    console.log(data);
                }else{
                    console.log("error");
                }
        },

        async GetProduct () {
            const res = await fetch ('http://localhost:8000/api/GetProduct', {
                method: 'GET',  
            });
            const data = await res.json();
            if(data){
                this.Box = data;
            }else{
                console.log('please add a product')
            }
        },

        async DeleteProduct (id) {
            const product_id = id;
            const res = await fetch ('http://localhost:8000/api/DeleteProduct', {
                method: 'DELETE',
                body: JSON.stringify({
                    id: product_id,
                })
            });
            const data = await res.json();
            if(data){
                console.log('product deleted');
            }else {
                console.log('error');
            }
        },

        async FindProduct (id) {
            const product = this.Box.find(e => e.product_id == id);
            this.Update = product;
        },

        async UpdateProduct () {
            const res = await fetch ('http://localhost:8000/api/UpdateProduct', {
                method: 'PUT',
                body: JSON.stringify({
                    image: this.Update.image,
                    name: this.Update.name,
                    description: this.Update.description,
                    price: this.Update.price,
                    product_id: this.Update.product_id,
                })
            });
            const data = await res.json();
            if(data){
                console.log('product updated');
            }else {
                console.log('error');
            }
        },
    },

    mounted () {
        this.GetProduct ();
    }
}
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
                        <button class="dropdown-item" name="delete" @click="DeleteProduct(box.product_id)">Delete</button>
                        <button @click="FindProduct(box.product_id)" class="dropdown-item" name="update" data-bs-toggle="modal" data-bs-target="#staticBackdrops">Update</button>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
           <form @submit.prevent="UpdateProduct(Update.product_id)">
                <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLabel">Update Produit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <input type="text" name="image" placeholder="Image" v-model="Update.image">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nome" placeholder="Nome" v-model="Update.name">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="description" placeholder="descriptions" v-model="Update.description">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="prix" placeholder="Prix" v-model="Update.price">
                    </div>
                    <div class="modal-footer">
                        <input class="btn w-100" type="Submit" name="update" value="Update" data-bs-dismiss="modal">
                    </div>
            </div>
            </div>
            </div>
           </form>
            <!-- ---------------------Add------------------------ -->
            <form @submit.prevent="AddProduct">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLabel">Add Produit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="image" @change="selectimage">
                        <button @click="onupload">click</button>
                        <!-- <input type="text" name="image" placeholder="Image" v-model="this.Product.image"> -->
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nome" placeholder="Nome" v-model="this.Product.name">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="description" placeholder="descriptions" v-model="this.Product.description">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="prix" placeholder="Prix" v-model="this.Product.price">
                    </div>
                    <div class="modal-footer">
                        <input class="btn w-100" type="Submit" name="add" value="Add" data-bs-dismiss="modal">
                    </div>
                </div>
                </div>
                </div>
            </form>
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