<script setup>
import axios from 'axios';
import { ref } from 'vue';

const user = ref();

async function sendRequest() {
    const response = await axios.get('/demo-request')

    if (response.status === 200) {
        user.value = response.data;
        console.log("GET : " + response.data['message']);
    }
}

async function submitData() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await axios.post('/demo-post', {
            headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
            },
        });
        // Handle the response
        if (response.status === 200) {
            console.log("POST : " + response.data['message']);
        }
    } catch (error) {
        // Handle errors
    }
}

</script>

<template>
    <h1>Hello, {{ user ? user.name : 'World' }}</h1>
    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
    @click="sendRequest">
        Send GET
    </button>

    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
    @click="submitData">
        Send Post
    </button>
</template>