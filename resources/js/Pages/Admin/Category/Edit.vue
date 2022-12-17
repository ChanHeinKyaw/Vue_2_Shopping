<template>
    <Master>
        <template slot="title">
            <h1>Update Category</h1>
        </template>
        <template slot="body">
            <Link href="/admin/category" class="btn btn-dark btn-sm">Back</Link>
            <form @submit.prevent="update">
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" class="form-control border" :class="{'border-danger' : errors.name }" v-model="name">
                    <small class="text text-danger" v-show="errors.name">{{ errors.name }}</small>
                </div>

                <button type="submit" class="btn btn-primary" :disabled="loading">Update</button>
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
    props: {errors: Object, cat: Object},
    data(){
        return {
            name: "",
            loading: false,
        }
    },
    created(){
        this.name = this.cat.name;
    },
    methods: {
        update(){
            this.loading = true,
            this.$inertia.put('/admin/category/' + this.cat.id,
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