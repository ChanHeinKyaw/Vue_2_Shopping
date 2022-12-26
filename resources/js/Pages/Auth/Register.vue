<template>
    <Master>
        <div class="card">
            <h3 class="card-header font-weight-bold bg-primary text-white">Register</h3>
            <div class="card-body">
                <form  @submit.prevent="register">
                    <div class="form-group">
                        <label for="">Enter Your Name</label>
                        <input type="name" v-model="name" class="form-control" :class="{'border-danger' : errors.name }">
                        <small class="text text-danger" v-show="errors.name">{{ errors.name }}</small>
                    </div>

                    <div class="form-group">
                        <label for="">Enter Your Email</label>
                        <input type="email" v-model="email" class="form-control" :class="{'border-danger' : errors.email }">
                        <small class="text text-danger" v-show="errors.email">{{ errors.email }}</small>
                    </div>

                    <div class="form-group">
                        <label for="">Enter Your Password</label>
                        <input type="password" v-model="password" class="form-control" :class="{'border-danger' : errors.password }">
                        <small class="text text-danger" v-show="errors.password">{{ errors.password }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="loading">Register</button>
                    <div class="spinner-border spinner-border-sm" role="status" v-show="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </form>
            </div>
        </div>
    </Master>
</template>

<script>
import Master from "../Layout/Master.vue"
import { Link } from "@inertiajs/inertia-vue";
export default {
    name: "Register",
    data(){
        return {
            name: "",
            email: "",
            password: "",
            loading: false,
        }
    },
    props: {errors: Object},
    components: {Master,Link},
    methods: {
        register(){
            const data = {name:this.name,email:this.email,password:this.password};
            this.$inertia.post('/register',data,{
                onStart: () => (this.loading = true),
                onFinish: () => (this.loading = false),
            })
        }
    }
}
</script>