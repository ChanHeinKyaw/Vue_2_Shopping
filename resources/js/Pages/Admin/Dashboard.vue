<template>
    <Master>
        <template slot="title">
           <h3>Admin Dashboard</h3>
        </template>
        <template slot="body">
            Dashboard
        </template>
    </Master>
</template>

<script>
import Master from './Master.vue';
export default {
    name : "Dashboard",
    components: {Master},
}
</script>
