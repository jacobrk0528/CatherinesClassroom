<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    transaction: {
        type: Object,
        required: true,
    },
    isAdmin: {
        type: Boolean,
        required: true,
    }
});

const viewResource = (resource) => {
    console.log(`View resource:`, resource);
};

const goHome = () => {
    router.get(route('home'))
};

const goToDashboard = () => {
    router.get(route('dashboard'))
};
</script>


<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Transaction Details -->
                        <h2 class="text-lg font-semibold mb-4">Order Information</h2>
                        <div class="mb-4">
                            <p><strong>ID:</strong> {{ transaction.id }}</p>
                            <p><strong>Status:</strong> {{ transaction.transaction_status }}</p>
                            <p><strong>Amount:</strong> ${{ transaction.transaction_amount }}</p>
                            <p><strong>User ID:</strong> {{ transaction.user_id }}</p>
                            <p><strong>Created At:</strong> {{ transaction.created_at }}</p>
                            <p><strong>Updated At:</strong> {{ transaction.updated_at }}</p>
                        </div>

                        <!-- Associated Resources -->
                        <h2 class="text-lg font-semibold mb-4">Associated Resources</h2>
                        <div v-if="transaction.resources && transaction.resources.length">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Type</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="resource in transaction.resources" :key="resource.id" class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2 capitalize">{{ resource.resourceable_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span v-if="resource.resourceable.lesson_name">{{ resource.resourceable.lesson_name }}</span>
                                            <span v-else-if="resource.resourceable.file_name">{{ resource.resourceable.file_name }}</span>
                                            <span v-else-if="resource.resourceable.unit_name">${{ resource.resourceable.unit_name }}</span>
                                            <span v-else>Unknown</span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span v-if="resource.resourceable.lesson_price">${{ resource.resourceable.lesson_price }}</span>
                                            <span v-else-if="resource.resourceable.file_price">${{ resource.resourceable.file_price }}</span>
                                            <span v-else-if="resource.resourceable.unit_price">${{ resource.resourceable.unit_price }}</span>
                                            <span v-else>—</span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <button
                                                class="text-blue-500 hover:underline"
                                                @click="viewResource(resource)"
                                            >
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p v-else>No resources associated with this transaction.</p>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <button
                        @click="goHome"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4"
                    >
                        Home
                    </button>
                    <button
                        @click="goToDashboard"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Dashboard
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


