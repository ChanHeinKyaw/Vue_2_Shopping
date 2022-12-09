<template>
  <nav aria-label="...">
    <ul class="pagination">
        <li class="page-item" v-for="(d,index) in data" :key="index" :class="{disabled : d.url == null,active: d.active}">
            <Link class="page-link" :href="d.url" v-show="d.label !== '&laquo; Previous' && d.label !== 'Next &raquo;'">
                {{ d.label }}
            </Link>
            
            <!-- For Pref -->
            <Link class="page-link" :href="d.url" v-show="d.label == '&laquo; Previous'">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Pref</span>
            </Link>

            <!-- For Next -->
            <Link class="page-link" :href="d.url" v-show="d.label == 'Next &raquo;'">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </Link>
        </li>
    </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'
export default {
    name: "Pagination",
    props: {data: Array},
    components: {Link}
}
</script>

<style scoped>
    .pagination{
        justify-content: center;
    }
</style>