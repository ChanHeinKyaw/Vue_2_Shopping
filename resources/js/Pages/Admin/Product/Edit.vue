<template>
    <Master>
        <template slot="title">
            <h1>Update Product</h1>
        </template>
        <template slot="body">
            <Link href="/admin/product" class="btn btn-dark btn-sm">Back</Link>
            <form @submit.prevent="update">
                <!-- Category -->
                <div class="form-group">
                    <label for="">Choose Category</label>
                    <select name="category_id" v-model="category_id" class="form-control" :class="{'border-danger' : errors.category_id }">
                        <option v-for="c in cat" :key="c.id" :value="c.id">
                            {{ c.name }}
                        </option>   
                    </select>
                    <small class="text text-danger" v-show="errors.category_id">{{ errors.category_id }}</small>
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" class="form-control border" :class="{'border-danger' : errors.name }" v-model="name">
                    <small class="text text-danger" v-show="errors.name">{{ errors.name }}</small>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="">Enter Price</label>
                    <input type="number" class="form-control border" :class="{'border-danger' : errors.price }" v-model="price">
                    <small class="text text-danger" v-show="errors.price">{{ errors.price }}</small>
                </div>
                
                <!-- Image -->
                <div class="form-group">
                    <label for="">Choose Image</label>
                    <input type="file" class="form-control border" :class="{'border-danger' : errors.image }" @change="chooseImage">
                    <small class="text text-danger" v-show="errors.image">{{ errors.image }}</small>
                </div>
                <img :src="`/${product.image}`" width="150px" alt="">

                <!-- Description -->
                <div class="form-group">
                    <label for="">Enter Description</label>
                    <textarea name="description" class="form-control" v-model="description" :class="{'border-danger' : errors.description }"></textarea>
                    <small class="text text-danger" v-show="errors.description">{{ errors.description }}</small>
                </div>

                <button type="submit" class="btn btn-primary" :disabled="loading">Create</button>
                <div class="spinner-border spinner-border-sm" role="status" v-show="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </form>
        </template>
    </Master>
</template>

<script>
import Master from "../Master"
import { Link } from '@inertiajs/inertia-vue';
export default {
    name: "edit-category",
    components: { Master,Link },
    props: {errors: Object, cat: Array, product: Object},
    data(){
        return {
            category_id: "",
            name: "",
            price: "",
            image: "",
            description: "",
            loading: false,
        }
    },
    created(){
        this.category_id = this.product.category_id;
        this.name = this.product.name;
        this.price = this.product.price;
        this.description = this.product.description;
    },
    methods: {
        update(){
            this.loading = true,
            this.$inertia.put('/admin/product/' + this.product.id,
            {
                name: this.name,
                __methods: "PUT",
            },
            {
                onSuccess: () => {
                    this.loading = false;
                }
            },
            )
        }
    }
}
</script>