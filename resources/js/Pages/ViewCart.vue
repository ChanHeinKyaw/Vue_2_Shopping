<template>
    <Master>
        <h2>Your Cart List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cart_data in cart_datas.data" :key="cart_data.id">
                    <td>
                        <img
                            :src="cart_data.product.image"
                            style="width: 50px; border-radius: 30%"
                            alt=""
                        />
                    </td>
                    <td>{{ cart_data.product.name }}</td>
                    <td>{{ cart_data.qty }}</td>
                </tr>
            </tbody>
        </table>
        <div class="row d-flex justify-content-between">
            <div>
                <pagination :data="cart_datas.links" />
            </div>

            <div class="mt-2">
                <Link href="/checkout" class="btn btn-primary btn-sm">Check Out</Link>
            </div>
        </div>
    </Master>
</template>

<script>
import Master from "./Layout/Master.vue";
import { Link } from "@inertiajs/inertia-vue";
import Pagination from './Admin/Share/Pagination.vue';
export default {
    name: "ViewCart",
    components: { Master, Link, Pagination },
    props: {cart_datas: Object},
};
</script>
