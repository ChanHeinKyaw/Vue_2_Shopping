<template>
    <Master>
        <h2 v-show="!isCompletedRoute">Your Pending Order List</h2>
        <h2 v-show="isCompletedRoute">Your Complete Order List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in Orders" :key="order.id">
                    <td>
                        <img
                            :src="`/${order.product.image}`"
                            style="width: 50px; border-radius: 30%"
                            alt=""
                        />
                    </td>
                    <td>{{ order.product.name }}</td>
                    <td>{{ order.qty }}</td>
                </tr>
            </tbody>
        </table>
        <div class="row d-flex justify-content-between">
            <div>
                <pagination :data="Orders.links" />
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
    name: "OrderList",
    components: { Master, Link, Pagination },
    props: {Orders: Array},
    computed:{
        isCompletedRoute(){
            const comRoute = location.pathname;
            if(comRoute == "/order/complete"){
                return true;
            }
            return false;
        }
    }
};
</script>
