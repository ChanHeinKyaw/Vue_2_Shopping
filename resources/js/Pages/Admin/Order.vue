<template>
  <Master>
    <template slot="title">
        <h1 v-show="!isSuccess">Pending Order</h1>
        <h1 v-show="isSuccess">Success Order</h1>
    </template>
    <template slot="body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>User</th>
            <th>Product</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders.data" :key="order.id">
            <td>{{ order.user.name }}</td>
            <td>{{ order.product.name }}</td>
            <td>{{ order.phone }}</td>
            <td>{{ order.address }}</td>
            <td>
                <Link :href="`/admin/order/success/${order.id}`" class="badge badge-primary" v-show="!isSuccess">Make Success</Link>
                <Link :href="`/admin/order/success/${order.id}`" class="badge badge-info" v-show="isSuccess">No Option</Link>
            </td>
          </tr>
        </tbody>
      </table>
      <Pagination :data="orders.links" /> 
    </template>
  </Master>
</template>

<script>
import Master from "./Master.vue";
import Pagination from "./Share/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: "Order",
    props: {orders: Object},
    components:{Master,Link,Pagination},
    computed: {
        isSuccess(){
            if(location.pathname == '/admin/order/success'){
                return true;
            }
            return false;
        }
    }
}
</script>

<style scoped>
 .delete-btn{
  cursor: pointer;
 }
</style>