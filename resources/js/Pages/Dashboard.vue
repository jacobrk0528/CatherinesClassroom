<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DataOverview from '@/Components/DataOverview.vue';
import Graph from '@/Components/Graph.vue';
import DatePicker from '@/Components/DatePicker.vue';


const props = defineProps(["date", "orderCount", "revenue", "hourlyOrders", "orders"]);

const orderCount = ref(props.orderCount);
const revenue = ref(props.revenue);
const hourlyOrders = ref(props.hourlyOrders);
const orders = ref(props.orders);

const date = ref(new Date(props.date).toISOString());

watch(date, (newDate, oldDate) => {
    if (newDate != oldDate) {
        router.get(route('dashboard'), { date: newDate });
    }
});

const viewOrder = (id) => {
    router.get(route('transaction.show', {transaction: id}));
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <!-- Date Picker -->
                    <div class="flex justify-end w-full p-2">
                        <DatePicker class="w-fit" v-model="date" />
                    </div>

                    <!-- Header -->
                    <div class="flex justify-center w-full p-6">
                        <DataOverview title="Order Count" :value=orderCount />
                        <DataOverview title="Revenue" :value=revenue :money="true" />
                    </div>

                    <!-- Graph  -->
                    <div class="w-full flex justify-center">
                        <div class="w-11/12 h-full p-4 my-4">
                            <Graph :data="hourlyOrders" title="Orders Per Hour" />
                        </div>
                    </div>

                    <!-- Table  -->
                    <div class="p-4 my-4">
                        <div class="max-h-96 overflow-y-scroll border border-gray-300 rounded-md">
                            <table class="min-w-full border-collapse bg-white shadow-md">
                                <thead class="sticky top-0 z-10">
                                    <tr class="bg-gray-100 border-b border-gray-300">
                                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Email</th>
                                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Status</th>
                                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Amount</th>
                                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Time</th>
                                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in orders" :key="order.id" class="border-b border-gray-300 hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-700">{{ order.email }}</td>
                                        <td class="px-4 py-2 text-gray-700 capitalize">{{ order.status }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ order.amount }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ order.time }}</td>
                                        <td class="px-4 py-2 text-gray-700">
                                            <button
                                                class="text-blue-500 hover:underline"
                                                @click="viewOrder(order.id)"
                                            >
                                                Show Order
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
