<template>
  <div class="row">
    <div class="col-md-4 offset-4">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Please Login</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" v-model="email" class="form-control" name="" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="password" v-model="password" class="form-control" name="" id="">
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="loading">Login</button>
                    <div class="spinner-border spinner-border-sm" role="status" v-show="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            email: "",
            password: "",
            loading: false,
        }
    },
    methods:{
        login(){
            const data = {email : this.email, password: this.password};
            this.$inertia.post('/admin/login',data,{
                onStart: () => (this.loading = true),
                onFinish: () => (this.loading = false),
            })
        },
    },
    watch:{
        '$page.props.success' : function(value){
                this.$toastr.s(value);
        },
        '$page.props.info' : function(value){
                this.$toastr.i(value);
        },
        '$page.props.danger' : function(value){
                this.$toastr.e(value);
        }
    }

}
</script>