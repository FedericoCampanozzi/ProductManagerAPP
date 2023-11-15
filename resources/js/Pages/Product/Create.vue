<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    product_name: '',
    qty: 0,
    prince: 0.0,
    description: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <div class="p-5">
        <h1><strong>Insert a new product</strong></h1>        
        <form @submit.prevent="submit">
            <div class="p-5 my-form">
                <InputLabel for="product_name" value="Product Name" />    
                <TextInput id="product_name" type="product_name" class="mt-1 block w-full" v-model="form.product_name" required/>    
                <InputError class="mt-2" :message="form.errors.product_name" />
            </div>
            <div class="p-5 my-form">
                <InputLabel for="qty" value="Qt.à" />    
                <TextInput id="qty" type="numeric" class="mt-1 block w-full" v-model="form.qty" required/>    
                <InputError class="mt-2" :message="form.errors.qty" />
            </div>
            <div class="p-5 my-form">
                <InputLabel for="prince" value="Price" />
                <TextInput id="prince" type="numeric" class="mt-1 block w-full" v-model="form.prince" required/>
                <InputError class="mt-2" :message="form.errors.prince" />
            </div>
            <div class="p-5 my-form">
                <InputLabel for="description" value="Description" />    
                <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.email"/>    
                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <div>
                <PrimaryButton style="margin-left: 1.25em;" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Insert
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>