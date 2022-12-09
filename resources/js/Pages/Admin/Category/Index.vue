<template>
  <Master>
    <template slot="title">
      <h1>All Category</h1>
    </template>
    <template slot="body">
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
              <Link href="/" class="badge badge-primary">Update</Link>
              <Link href="/" class="badge badge-danger">Delete</Link>
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
    components:{Master,Link,Pagination}
}
</script>