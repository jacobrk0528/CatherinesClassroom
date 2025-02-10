<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    unit: Object, // Existing unit data
});

const form = useForm({
    name: props.unit?.name || "",
    price: props.unit?.price || "",
});

const submitForm = () => {
    form.put(route("units.update", props.unit.id));
};
</script>

<template>
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h2 class="text-xl font-semibold mb-4">Edit Unit</h2>

        <form @submit.prevent="submitForm">
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Unit Name</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <!-- Price Field -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-1">Price ($)</label>
                <input
                    type="number"
                    id="price"
                    v-model="form.price"
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200"
                    step="0.01"
                    required
                />
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Update Unit
            </button>
        </form>
    </div>
</template>

