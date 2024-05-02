<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    product: Object,
});


</script>

<template>
    <AppLayout title="MarketPlace">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ product.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 flex flex-col lg:flex-row gap-6">
                        <img :src="product.imagePath" alt="Product Image" class="max-w-sm rounded-lg shadow-md"/>
                        <div class="flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ product.name }}</h3>
                                <p class="text-gray-600 dark:text-gray-200 mt-2">{{ product.description }}</p>
                            </div>
                            <div class="mt-4">
                                <div class="text-lg font-semibold text-gray-800 dark:text-white">{{ product.price }} ₽</div>
                                <button class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Добавить в корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
