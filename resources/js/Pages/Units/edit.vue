<script setup>
import { Head, router, useForm } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

const props = defineProps({
    unit: Object,
});

const form = useForm({
    name: props.unit?.name || "",
    price: props.unit?.price || "",
});

const submitForm = () => {
    form.put(route("units.update", props.unit.id));
};

function back() {
    router.get(route("units.index"));
}
</script>

<template>

    <Head title="Edit Unit" />

    <ApplicationLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Unit
            </h2>
        </template>

        <div class="flex flex-col items-center justify-center min-h-[80vh]">
            <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-semibold mb-4">Edit Unit</h2>

                <form @submit.prevent="submitForm">
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-1">Unit Name</label>
                        <input type="text" id="name" v-model="form.name"
                            class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200"
                            required />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <!-- Price Field -->
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-medium mb-1">Price ($)</label>
                        <input type="number" id="price" v-model="form.price"
                            class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200"
                            step="0.01" required />
                        <p v-if="form.errors.price" class="text-red-500 text-sm mt-1">{{ form.errors.price }}</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-around">
                        <PrimaryButton type="submit">
                            Edit Unit
                        </PrimaryButton>

                        <SecondaryButton @click="back">
                            Back
                        </SecondaryButton>
                    </div>
                </form>
            </div>
        </div>
    </ApplicationLayout>
</template>
