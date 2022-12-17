<template>
    <Master>
        <template slot="title">
            <h1>Product Detail</h1>
        </template>
        <template slot="body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Categroy</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>View Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ product.category.name }}</td>
                        <td>{{ product.name }}</td>
                        <td>
                            <img :src="`/${product.image}`" alt="" width="50px">
                        </td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.view_count }}</td>
                    </tr>
                </tbody>
            </table>
            <p>
                {{ product.description }}
            </p>
        </template>
    </Master>
</template>

<script>
import Master from "../Master"
export default {
    name: "product-view",
    components: { Master },
    props: { product: Object },
}
</script>