<template>
    <Master>
        <div class="card">
            <h3 class="card-header font-weight-bold bg-primary text-white">Login</h3>
            <div class="card-body">
                <div class="alert alert-danger" v-show="errors.error">{{ errors.error }}</div>
                <form @submit.prevent="login">
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

                    <button type="submit" class="btn btn-primary" :disabled="loading">Login</button>
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
    name: "Login",
    data(){
        return {
            loading: false,
            email: "",
            password: "",
        }
    },
    props: {errors: Object},
    components: {Master,Link},
    methods: {
        login(){
            const data = {email: this.email,password: this.password};
            this.$inertia.post('/login',data,{
                onStart: () => (this.loading = true),
                onFinish: () => (this.loading = false),
            })
        }
    }
}
</script>