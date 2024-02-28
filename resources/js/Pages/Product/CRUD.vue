<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';
import { computed } from 'vue';

const props = defineProps({
    product: {
        type: [null, Object],
        required: true
    },
    canEdit: {
        type: Boolean,
        required: true,
    },
    canInsert: {
        type: Boolean,
        required: true,
    },
})

const insert = () => {
    axios.post("/insert-product", { product: props.product } ).then(res => {
    });
};

const update = () => {
    axios.post("/update-product", { product: props.product }).then(res => {
    });
};

const destroy = () => {
    axios.delete("/delete-product", { data: { product: props.product } }).then(res => {
    });
};


const label = computed(() => props.canEdit ? "Edit or Delete this product" : props.canInsert ? "Insert a new product" : "See this product");
const forceDisabled = computed(() => !props.canEdit && !props.canInsert );

</script>

<template>
    <div class="my-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-bg-detail overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5" v-if="product != null">
                    <h1><strong>{{ label }}</strong></h1>
                        <div class="p-5">
                            <div class="my-form-33">
                                <InputLabel 
                                    for="id" 
                                    value="ID" />
                                <TextInput 
                                    id="id" 
                                    type="number" 
                                    v-model="props.product.id"
                                    disabled />
                            </div>
                            <div class="my-form-33">
                                <InputLabel 
                                    for="created_at" 
                                    value="Create ON" />
                                <TextInput 
                                    id="created_at" 
                                    type="text" 
                                    v-model="props.product.created_at" 
                                    disabled />
                            </div>
                            <div class="my-form-33">
                                <InputLabel 
                                    for="updated_at" 
                                    value="Update ON" />
                                <TextInput 
                                    id="updated_at" 
                                    type="text" 
                                    v-model="props.product.updated_at" 
                                    disabled />
                            </div>
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel
                                for="product_name" 
                                value="Product Name" />
                            <TextInput 
                                id="product_name" 
                                type="text" 
                                class="mt-1 block w-full" 
                                v-model="props.product.name" 
                                :disabled="forceDisabled"
                                required />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel 
                                for="qty" 
                                value="Qt.à" />
                            <TextInput id="qty" 
                                type="numeric" 
                                class="mt-1 block w-full" 
                                v-model="props.product.qty" 
                                required :disabled="forceDisabled" />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel 
                                for="price" 
                                value="Price" />
                            <TextInput 
                                id="price" 
                                type="numeric" 
                                class="mt-1 block w-full" 
                                v-model="props.product.price" 
                                :disabled="forceDisabled"
                                required />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel 
                                for="description" 
                                value="Description" />
                            <TextInput 
                                id="description"
                                type="text" 
                                class="mt-1 block w-full" 
                                v-model="props.product.description" 
                                :disabled="forceDisabled" />
                        </div>
                        <div>
                            <PrimaryButton 
                                v-if="canInsert"
                                style="margin-left: 1.25em;" 
                                @click="insert">
                                    Insert
                            </PrimaryButton>
                            <PrimaryButton 
                                v-if="canEdit"
                                style="margin-left: 1.25em;" 
                                @click="update">
                                    Update
                            </PrimaryButton>
                            <PrimaryButton
                                v-if="canEdit"
                                style="margin-left: 1.25em; background-color: rgb(189, 0, 0) !important; color: white;" 
                                @click="destroy">
                                    Delete
                            </PrimaryButton>
                        </div>
                </div>
                <div class="p-5" v-if="product == null">
                    <h1>This product don't exist in this database</h1>
                </div>
            </div>
        </div>
    </div>
</template>