/*
import './bootstrap';
import { createApp } from 'vue';
import EditDialog from './Pages/Product/EditDialog.vue';
import Create from './Pages/Product/Create.vue';
import ProductTable from './Pages/Product/ProductTable.vue';

const app = createApp({});

app
  .component('EditDialog', EditDialog)
  .component('Create', Create)
  .component('ProductTable', ProductTable);
// caricare la componente specificata da Initia
app.mount("#app");*/

require('./bootstrap');

import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.use(InertiaApp)

const app = document.getElementById('app')

if(app) {
    new Vue({
      render: h => h(InertiaApp, {
        props: {
          initialPage: JSON.parse(app.dataset.page),
          resolveComponent: name => require(`./Pages/${name}`).default,
        },
      }),
    }).$mount(app)    
}