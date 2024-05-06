<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    saler: Number
});
const form = useForm({
    _token: props.token,
    saler: props.saler,
    name: '',
    description: '',
    price: 0,
    file: null,
    image: null
});
const fileInput = ref(null);
const imageInput = ref(null);
const imageUrl = ref(null);

const submit = () => {
    if (imageInput.value?.files[0]) {
        form.image = imageInput.value.files[0];
    }
    if (fileInput.value?.files[0]) {
        form.file = fileInput.value.files[0];
    }
    form.post(route("product.store"), {
        onSuccess: () => {
            console.log('Upload Success');
        },
        onError: (error) => {
            console.error('Upload failed:', error);
        }
    });
}

const previewImage = () => {
    if (imageInput.value?.files[0]) {
        const image = imageInput.value.files[0];
        imageUrl.value = URL.createObjectURL(image);
    }
}
</script>

<template>
    <AppLayout title="MarketPlace">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name</label>
                            <input type="text" id="name" v-model="form.name" class="text-gray-50 bg-transparent border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                            <textarea id="description" v-model="form.description" rows="4" class="text-gray-50 bg-transparent  border border-gray-300text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-none" required></textarea>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                            <input type="number" id="price" v-model="form.price" class="text-gray-50 bg-transparent border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Image</label>
                            <input @change="previewImage" type="file" id="image" ref="imageInput" class="text-gray-50 bg-transparent text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5"/>
                            <img v-if="imageUrl" :src="imageUrl" class="mt-4 h-80"/>
                        </div>
                        <div>
                            <label for="file-cert" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Cert (only pdf)</label>
                            <input type="file" id="file-cert" ref="fileInput" class="text-gray-50 bg-transparent text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5"/>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
