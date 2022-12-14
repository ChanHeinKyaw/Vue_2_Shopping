<template>
  <Master>
    <template slot="title">
      <h1>All Category</h1>
    </template>
    <template slot="body">
      <Link href="/admin/category/create" class="btn btn-primary btn-sm">Create</Link>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="c in cat.data" :key="c.id">
            <td>{{ c.name }}</td>
            <td>
              <Link :href="`/admin/category/${c.id}/edit`" class="badge badge-primary">Edit</Link>
              <span class="badge badge-danger delete-btn" @click="destroy(c.id)">Delete</span>
            </td>
          </tr>
        </tbody>
      </table>
      <Pagination :data="cat.links" /> 
    </template>
  </Master>
</template>

<script>
import Master from "../Master.vue";
import Pagination from "../Share/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: "Index",
    props: {cat: Object},
    components:{Master,Link,Pagination},
    methods: {
      destroy(id){
        if(confirm('Are You Sure You Want to Delete?')){
          const data = {id , _method: "DELETE"};
          this.$inertia.delete('/admin/category/'+id , data);
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