<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
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

const form = computed(() => useForm({
    id: props.product.id,
    product_name: props.product.name,
    qty: props.product.qty,
    prince: props.product.price,
    description: props.product.description,
    created_at: new Date(props.product.created_at).toLocaleString(),
    updated_at: new Date(props.product.updated_at).toLocaleString(),
}));

const update = () => {
    /*
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
    */
   console.log("product = ",props.product);
};

const destroy = () => {
    /*
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
    */
   console.log("product = ",props.product);
};

const insert = () => {
    console.log("product = ", props.product);
    route('product.insert', [props.product]);
};

const label = computed(() => props.canEdit ? "Edit or Delete this product" : props.canInsert ? "Insert a new product" : "See this product");
const forceDisabled = computed(() => !props.canEdit && !props.canInsert );

</script>

<template>
    <div class="my-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5" v-if="product != null">
                    <h1><strong>{{ label }}</strong></h1>
                    <form>
                        <div class="p-5">
                            <div class="my-form-33">
                                <InputLabel for="id" value="ID" />
                                <TextInput id="id" type="number" v-model="form.id" disabled/>
                                <InputError class="mt-2" :message="form.errors.id" />                                
                            </div>
                            <div class="my-form-33">
                                <InputLabel for="created_at" value="Create ON" />
                                <TextInput id="created_at" type="text" v-model="form.created_at" disabled/>
                                <InputError class="mt-2" :message="form.errors.created_at" />
                            </div>
                            <div class="my-form-33">
                                <InputLabel for="updated_at" value="Update ON" />
                                <TextInput id="updated_at" type="text" v-model="form.updated_at" disabled/>
                                <InputError class="mt-2" :message="form.errors.updated_at" />
                            </div>
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel for="product_name" value="Product Name" />
                            <TextInput id="product_name" type="text" class="mt-1 block w-full" v-model="form.product_name" required :disabled="forceDisabled"/>
                            <InputError class="mt-2" :message="form.errors.product_name" />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel for="qty" value="Qt.à" />
                            <TextInput id="qty" type="numeric" class="mt-1 block w-full" v-model="form.qty" required :disabled="forceDisabled"/>
                            <InputError class="mt-2" :message="form.errors.qty" />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel for="prince" value="Price" />
                            <TextInput id="prince" type="numeric" class="mt-1 block w-full" v-model="form.prince" required :disabled="forceDisabled"/>
                            <InputError class="mt-2" :message="form.errors.prince" />
                        </div>
                        <div class="p-5 my-form">
                            <InputLabel for="description" value="Description" />
                            <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" :disabled="forceDisabled"/>
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div>
                            <PrimaryButton 
                                v-if="canInsert"
                                style="margin-left: 1.25em;" 
                                :class="{ 'opacity-25': form.processing }" 
                                :disabled="form.processing"
                                @click="insert">
                                    Insert
                            </PrimaryButton>
                            <PrimaryButton 
                                v-if="canEdit"
                                style="margin-left: 1.25em;" 
                                :class="{ 'opacity-25': form.processing }" 
                                :disabled="form.processing"
                                @click="update">
                                    Update
                            </PrimaryButton>
                            <PrimaryButton
                                v-if="canEdit"
                                style="margin-left: 1.25em; background-color: rgb(189, 0, 0) !important; color: white;" 
                                :class="{ 'opacity-25': form.processing }" 
                                :disabled="form.processing"
                                @click="destroy">
                                    Delete
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
                <div class="p-5" v-if="product == null">
                    <h1>This product don't exist in this database</h1>
                </div>
            </div>
        </div>
    </div>
</template>