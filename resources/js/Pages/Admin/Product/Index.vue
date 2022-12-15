<template>
  <Master>
    <template slot="title">
      <h1>All Product</h1>
    </template>
    <template slot="body">
      <Link href="/admin/product/create" class="btn btn-primary btn-sm">Create</Link>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products.data" :key="product.id">
            <td>
              <img :src="`/${product.image}`" alt="" width="50px" style="border-radius:20%">
            </td>
            <td>{{ product.name }}</td>
            <td>{{ product.price }}</td>
            <td>
              <Link :href="`/admin/product/${product.id}/edit`" class="badge badge-primary">Edit</Link>
              <span class="badge badge-danger delete-btn" @click="destroy(product.id)">Delete</span>
            </td>
          </tr>
        </tbody>
      </table>
      <Pagination :data="products.links" /> 
    </template>
  </Master>
</template>

<script>
import Master from "../Master.vue";
import Pagination from "../Share/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: "Index",
    props: {products: Object},
    components:{Master,Link,Pagination},
    methods: {
      destroy(id){
        if(confirm('Are You Sure You Want to Delete?')){
          const data = {id , _method: "DELETE"};
          this.$inertia.delete('/admin/product/'+id , data);
        }
      }
    },
}
</script>

<style scoped>
 .delete-btn{
  cursor: pointer;
 }
</style>