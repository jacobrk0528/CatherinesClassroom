<script setup>
import { ref, computed } from 'vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DangerButton from '@/Components/DangerButton.vue'

const props = defineProps(['unit', 'lesson', 'files']);
const selectedFiles = ref([]);

function handleFileChange(event) {
    selectedFiles.value = event.target.files;
}

async function uploadFiles() {
    if (selectedFiles.value.length === 0) {
        validationErrors.value = ["Please select at least one file."];
        return;
    }

    let formData = new FormData();
    for (let i = 0; i < selectedFiles.value.length; i++) {
        formData.append("files[]", selectedFiles.value[i]);
    }

    try {
        const response = await router.post(route("units.lessons.files.store", { "unit": props.unit.id, "lesson": props.lesson.id }), formData);
        console.log(response);
        selectedFiles.value = [];
    } catch (error) {
        console.error("Upload failed:", error);
    }
}

function show(id) {
    window.open(route('file.download', { "file": id }));
}

function deleteFile(id) {
    router.delete(route('units.lessons.files.destroy', { "unit": props.unit.id, "lesson": props.lesson.id, "file": id }));
}

function back() {
    router.get(route("units.lessons.index", { "unit": props.unit.id }));
}
</script>

<template>

    <Head title="Files" />

    <ApplicationLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Files</h2>
        </template>

        <div class="py-12">
            <div class="p-6 flex justify-center w-full">
                <div class="flex flex-col w-8/12">
                    <!-- File Upload Section -->
                    <div class="mb-6">
                        <input type="file" multiple @change="handleFileChange"
                            class="border border-gray-300 p-2 rounded" />
                        <PrimaryButton @click="uploadFiles" class="ml-2">Upload Files</PrimaryButton>
                    </div>

                    <!-- File List -->
                    <div class="max-h-[40rem] overflow-y-scroll border border-gray-300 rounded-lg">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-800 text-white sticky top-0 z-10">
                                <tr>
                                    <th class="p-3 text-center w-5/12">File Name</th>
                                    <th class="p-3 text-center w-2/12">Price</th>
                                    <th class="p-3 text-center w-5/12">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="(file, index) in files" :key="index" class="hover:bg-gray-100 transition">
                                    <td class="p-3 border border-gray-300 text-center">{{ file.name }}</td>
                                    <td class="p-3 border border-gray-300 text-center">${{ file.price }}</td>
                                    <td class="p-3 border border-gray-300 text-center">
                                        <PrimaryButton @click="show(file.id)" class="mx-2">Download</PrimaryButton>
                                        <DangerButton @click="deleteFile(file.id)" class="mx-2">Delete</DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-between w-full my-6">
                        <SecondaryButton @click="back">Back</SecondaryButton>
                    </div>
                </div>
            </div>
        </div>
    </ApplicationLayout>
</template>

