<template>
        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-4">
                                <div class="card">
                                        <div class="card-body">
                                                <ul class="list-group">
                                                        <a>
                                                                <li class="list-group-item bg-primary text-white">
                                                                        Admin Management
                                                                </li>
                                                        </a>
                                                        <Link href="/admin/dashboard">
                                                                <li class="list-group-item">
                                                                        Dashboard
                                                                </li>
                                                        </Link>
                                                        <Link href="/admin/category">
                                                                <li class="list-group-item">
                                                                        Category
                                                                </li>
                                                        </Link>
                                                        <Link href="/admin/product">
                                                                <li class="list-group-item">
                                                                        Product
                                                                </li>
                                                        </Link>
                                                        <Link href="/admin/order/pending">
                                                                <li class="list-group-item">
                                                                        Pending Order
                                                                </li>
                                                        </Link >
                                                        <Link href="/admin/order/success">
                                                                <li class="list-group-item">
                                                                        Pending Success
                                                                </li>
                                                        </Link >
                                                </ul>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8">
                                <div class="card">
                                        <div class="card-header">
                                                <slot name="title"/>
                                        </div>
                                        <div class="card-body">
                                                <slot name="body"/>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue';
export default {
    name: "Master",
    components: {Link},
    created(){
        const {success} = this.$page.props;
        if(success){
                this.$toastr.s(success);
        }
    },
    watch:{
        '$page.props.success' : function(value){
                this.$toastr.s(value);
        },
        '$page.props.info' : function(value){
                this.$toastr.i(value);
        },
        '$page.props.danger' : function(value){
                this.$toastr.e(value);
        }
    }
}
</script>