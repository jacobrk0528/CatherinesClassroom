<script setup>
import { Head, router, useForm } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

const form = useForm({
    name: "",
    price: "",
});

const props = defineProps(["unit"]);

const submitForm = () => {
    form.post(route("units.lessons.store", { "unit": props.unit.id }));
};

function back() {
    router.get(route("units.lessons.index", { "unit": props.unit.id }));
}
</script>

<template>

    <Head title="Create Lesson" />

    <ApplicationLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Lesson
            </h2>
        </template>

        <div class="flex flex-col items-center justify-center min-h-[80vh]">
            <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-semibold mb-4 text-center">Create a New Lesson</h2>

                <form @submit.prevent="submitForm">
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-1">Lesson Name</label>
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
                            Create Lesson
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
