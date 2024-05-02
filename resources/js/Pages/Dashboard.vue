<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    products: Object,
    user: Object
});
</script>

<template>
    <AppLayout title="MarketPlace">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                MarketPlace
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div v-if="products.length === 0" class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4">
                    <p class="text-gray-600 dark:text-gray-400 m-2"> No items found ¯\_(ツ)_/¯ </p>
                </div>
                <div v-for="product in products" :key="product.id" class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-shadow duration-300 ease-in-out">
                    <Link :href="route('product.show', { product: product.id })" class="block hover:shadow-xl">
                        <img class="w-full h-62 object-cover" :src="product.imagePath" :alt="product.name" >
                        <div class="p-4">
                            <p class="text-gray-800 dark:text-white font-semibold text-md truncate">{{ product.name }}</p>
                            <div class="flex items-center justify-between mt-3">
                                <div class="text-lg font-bold text-green-500">{{ product.price }} ₽</div>
                                <div v-if="product.priceOld" class="text-sm text-gray-400 line-through">{{ product.priceOld }} ₽</div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
