<template>
    <Master>
        <template>
            <div class="card">
                <h4 class="card-header">Order Form</h4>
                <div class="card-body">
                    <form @submit.prevent="checkout">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input
                                type="number"
                                placeholder="09**********"
                                v-model="phone"
                                class="form-control"
                            />
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input
                                type="text"
                                placeholder="Address"
                                v-model="address"
                                class="form-control"
                            />
                        </div>
                        <button class="btn btn-primary btn-sm float-right">
                            Submit
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
    name: "CheckOut",
    components: { Master },
    data() {
        return {
            phone: "",
            address: "",
            loading: false,
        };
    },
    methods: {
        checkout() {
            const data = { phone: this.phone, address: this.address };
            this.$inertia.post("/checkout", data, {
                onStart: () => (this.loading = true),
                onFinish: () => (this.loading = false),
            });
        },
    },
};
</script>
