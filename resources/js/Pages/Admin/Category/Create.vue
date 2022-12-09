<template>
    <Master>
        <template slot="title">
            <h1>Create Category</h1>
        </template>
        <template slot="body">
            <Link href="/admin/category" class="btn btn-dark btn-sm">Back</Link>
            <form @submit.prevent="store">
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" class="form-control border" :class="{'border-danger' : errors.name }" v-model="name">
                    <small class="text text-danger" v-show="errors.name">{{ errors.name }}</small>
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
    name: "create-category",
    components: { Master,Link },
    props: {errors: Object},
    data(){
        return {
            name: "",
            loading: false,
        }
    },
    methods: {
        store(){
            this.loading = true,
            this.$inertia.post('/admin/category',
            {
                name: this.name
            },
            {
                onSuccess: () => {
                    this.name = "";
                    this.loading = false;
                }
            },
            )
        }
    }
}
</script>