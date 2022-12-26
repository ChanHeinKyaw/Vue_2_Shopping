<template>
    <Master>
        <div class="card">
            <h3 class="card-header font-weight-bold bg-primary text-white">Login</h3>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Enter Your Email</label>
                        <input type="email" v-model="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Enter Your Password</label>
                        <input type="password" v-model="password" class="form-control">
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
        }
    },
    components: {Master,Link}
}
</script>