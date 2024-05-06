<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';

const props = defineProps({
    cart: Object,
    items: Array
});
const form = useForm({
    name: '',
    phone: '',
    address: '',
    userId: ''
});
const calculateTotal = () => {
  return props.items.reduce((total, item) => total + item.price * item.count, 0);
};
const submitOrder = () => {
  form.post('/order/place');
};
</script>
<template>
    <AppLayout title="Оформление заказа">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Оформление заказа
            </h2>
        </template>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:text-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg leading-6 font-medium">Товары в заказе:</h3>
                    <ul>
                        <Link v-for="item in items" :key="item.id" class="py-2 flex">
                            <img :src="item.imagePath" alt="Миниатюра" class="h-12 w-12 rounded-md mr-4">
                            <div class="">
                                <p>{{ item.name }}   {{ item.count }} шт.</p>
                                <p>{{ item.count * item.price }} ₽</p>
                            </div>
                        </Link>
                    </ul>
                    <div class="mt-4">
                        <strong>Итого: {{ calculateTotal() }} ₽</strong>
                    </div>
                    <form @submit.prevent="submitOrder" class="mt-8">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-200">Имя:</label>
                            <input v-model="form.name" type="text" id="name" class="text-gray-50 bg-transparent text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5" required>
                        </div>
                        <div class="mt-4">
                            <label for="phone" class="block text-sm font-medium text-gray-200">Телефон:</label>
                            <input v-model="form.phone" type="tel" id="phone" class="text-gray-50 bg-transparent text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5" required>
                        </div>
                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-gray-200">Адрес:</label>
                            <input v-model="form.address" type="text" id="address" class="text-gray-50 bg-transparent text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg">Оформить заказ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
