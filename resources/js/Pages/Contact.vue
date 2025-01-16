<script setup>
import { Head } from '@inertiajs/vue3';
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue';

const props = defineProps(['csrfToken', 'submitRoute', 'message']);
</script>

<template>
    <Head title="Contact Me" />

    <ApplicationLayout>
        <div
            v-if="message && message == 'success'"
            class="flex justify-center w-full bg-green-300 p-4"
        >
            Message Sent Successfully
        </div>

        <div class="flex flex-1 justify-center items-center" style="min-height: 85vh">
            <form :action="submitRoute" method="POST"
                class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md">

                <!-- CSRF Token -->
                <input type="hidden" name="_token" :value="csrfToken" />

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" placeholder="Insert Name Here" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Insert Email Here" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                </div>

                <!-- Message Field -->
                <div class="mb-4">
                    <label for="message" class="block font-bold mb-2">Message</label>
                    <textarea id="message" name="message" placeholder="Insert Message Here" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </ApplicationLayout>
</template>

