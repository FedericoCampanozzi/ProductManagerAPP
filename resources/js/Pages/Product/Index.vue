<script setup>
import TableRenderer from '@/Components/TableRenderer.vue';
</script>

<template>
    <div class="py-5">
      <div class="my-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <TableRenderer :items="products" :columns="columns" :primary='"id"' action="/abcd" />
            </div>
        </div>
      </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
        columns: [
            {name:"Product Name",value:"name"},
            {name:"Qt.à",value:"qty"},
            {name:"Price (€)",value:"price"},
            {name:"Description",value:"description"}
        ],
        products: []
    }
  },
  created() {
    this.getAllProduct();
  },
  methods: {
    getAllProduct() {
      axios.get('/product-select')
        .then(response => {
          this.products = response.data['products'];
        });
    }
  }
}
</script>