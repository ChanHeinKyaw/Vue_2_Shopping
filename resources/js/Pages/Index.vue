<template>
    <Master>
        <div class="row">
            <!-- Loop Product -->
            <div class="col-md-4" v-for="p in product.data" :key="p.id">
                <a :href="`product/${p.slug}`">
                    <div class="card">
                        <img
                            class="card-img-top"
                            :src="`/${p.image}`"
                            alt=""
                        />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ p.name }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="" class="badge badge-primary"
                                        >{{ p.price }}ks</a
                                    >
                                </div>
                                <div class="col-md-4">
                                    <a href="" class="badge badge-warning"
                                        >{{ p.category.name }}</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <Pagination :data="product.links"></Pagination>
            </div>
        </div>
    </Master>
</template>

<script>
import Master from "./Layout/Master.vue";
import { Link } from '@inertiajs/inertia-vue';
import Pagination from './Admin/Share/Pagination.vue';

export default {
    name: "Index",
    components: { Master,Link,Pagination },
    props: { product: Object},
};
</script>
