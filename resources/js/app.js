require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'

// import plugin
import VueToastr from "vue-toastr";
// use plugin
Vue.use(VueToastr);

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    Vue.use(plugin)

    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})