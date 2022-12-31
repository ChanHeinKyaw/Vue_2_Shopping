<template>
    <Master>
        <h2>Your Pending Order List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pendingOrder in pendingOrders" :key="pendingOrder.id">
                    <td>
                        <img
                            :src="`/${pendingOrder.product.image}`"
                            style="width: 50px; border-radius: 30%"
                            alt=""
                        />
                    </td>
                    <td>{{ pendingOrder.product.name }}</td>
                    <td>{{ pendingOrder.qty }}</td>
                </tr>
            </tbody>
        </table>
        <div class="row d-flex justify-content-between">
            <div>
                <pagination :data="pendingOrders.links" />
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
    name: "PendingOrderList",
    components: { Master, Link, Pagination },
    props: {pendingOrders: Array},
};
</script>
