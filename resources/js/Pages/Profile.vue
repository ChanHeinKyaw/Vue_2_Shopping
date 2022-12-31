<template>
    <Master>
        <template>
            <div class="card">
                <h4 class="card-header">Profile</h4>
                <div class="alert alert-success" v-show="$page.props.success">{{ $page.props.success }}</div>
                <div class="card-body">
                    <form @submit.prevent="changeProfile">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input
                                type="text"
                                placeholder="name"
                                v-model="name"
                                class="form-control"
                            />
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input
                                type="email"
                                placeholder="name@example.com"
                                v-model="email"
                                class="form-control"
                            />
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input
                                type="password"
                                placeholder="**********"
                                v-model="password"
                                class="form-control"
                            />
                        </div>
                        <button class="btn btn-primary btn-sm float-right">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </template>
    </Master>
</template>

<script>
import Master from "./Layout/Master.vue";
export default {
    name: "Profile",
    components: { Master },
    data() {
        return {
            name: "",
            email: "",
            password: "",
            loading: false,
        };
    },
    created(){
        const {name,email} = this.$page.props.auth;
        this.name = name;
        this.email = email;
    },
    methods: {
        changeProfile() {
            const data = { name: this.name, email: this.email,password: this.password };
            this.$inertia.post("/profile", data, {
                onStart: () => (this.loading = true),
                onFinish: () => (this.loading = false),
            });
        },
    },
};
</script>
