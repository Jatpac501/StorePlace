<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
const props = defineProps({
    cart: Object,
    items: Array
});

const calculateTotal = () => {
  return props.items.reduce((total, item) => total + item.price * item.count, 0);
};

const removeItem = (item) => {
    router.post('/cart/remove', { productId: item.id });
};

const increment = (item) => {
    router.post('/cart/increment', { productId: item.id });
};
const decrement = (item) => {
    if (item.count > 1) {
        router.post('/cart/decrement', { productId: item.id });
    } else {
        if(confirm('Удалить товар из корзины?')) {
            removeItem(item);
        }
    }
};
</script>
<template>
    <AppLayout title="Shopping Cart">
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Корзина
        </h2>
      </template>
      <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg shadow-lg">
          <div v-if="items.length">
            <ul class="divide-y divide-gray-200">
              <li v-for="(item, index) in items" :key="item.id" class="px-4 py-2">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-4">
                    <img :src="item.imagePath" alt="Product Image" class="w-16 h-16 rounded-md object-cover" />
                    <div class="flex-1 min-w-0 m-2">
                      <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                        {{ item.name }}
                      </p>
                      <p class="text-gray-500 dark:text-gray-300">Цена: {{ item.price }} ₽</p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-2">
                      <button @click="decrement(item)" class="px-3 py-1 bg-red-500 text-white rounded-full hover:bg-red-700">
                        &minus;
                      </button>
                      <p class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ item.count }} шт.
                      </p>
                      <button @click="increment(item)" class="px-3 py-1 bg-green-500 text-white rounded-full hover:bg-green-700">
                        &plus;
                      </button>
                    </div>
                    <button @click="removeItem(item)" class="px-3 py-1 bg-yellow-500 text-white rounded-full hover:bg-yellow-700">
                      Удалить
                    </button>
                  </div>
                </div>
              </li>
            </ul>
            <div class="px-6 py-4 flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900 dark:text-white">Итого:</span>
              <span class="text-lg font-medium text-gray-900 dark:text-white">
                {{ calculateTotal() }} ₽
              </span>
            </div>
          </div>
          <div v-else class="px-6 py-4">
            <div class="text-center text-gray-800 dark:text-white">
              Корзина пуста
            </div>
          </div>
          <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 text-right">
            <button class="py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md opacity-90 hover:opacity-100">
              Оформить заказ
            </button>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>
