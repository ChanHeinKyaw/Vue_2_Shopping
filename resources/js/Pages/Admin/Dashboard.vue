<template>
    <Master>
        <template slot="title">
           <h3>Admin Dashboard</h3>
        </template>
        <template slot="body">
            <div class="card">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-body bg-primary text-white rounded">Category</div>
                        <h2 class="text-center">{{ data.category }}</h2>
                    </div>
                        <div class="col-md-3">
                        <div class="card-body bg-info text-white rounded">Product</div>
                        <h2 class="text-center">{{ data.product }}</h2>
                    </div>
                        <div class="col-md-3">
                        <div class="card-body bg-dark text-white rounded">Pending</div>
                        <h2 class="text-center">{{ data.pending }}</h2>
                    </div>
                        <div class="col-md-3">
                        <div class="card-body bg-warning text-white rounded">Success</div>
                        <h2 class="text-center">{{ data.complete }}</h2>
                    </div>
                </div>
                <h3>Latest 5 Users</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        <tr v-for="user in data.users" :key="user.id">
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </Master>
</template>

<script>
import Master from './Master.vue';
export default {
    name : "Dashboard",
    components: {Master},
    props: { data: Object},
}
</script>
