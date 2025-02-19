<script setup>
import { Head, router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DangerButton from '@/Components/DangerButton.vue'

const props = defineProps(['unit', 'lessons']);

function newLesson() {
    router.get(route('units.lessons.create', { "unit": props.unit.id }));
}

function show(id) {
    router.get(route('units.lessons.files.index', { "unit": props.unit.id, "lesson": id }));
}

function edit(id) {
    router.get(route('units.lessons.edit', { "unit": props.unit.id, "lesson": id }));
}

function deleteLesson(id) {
    router.delete(route('units.lessons.destroy', { "unit": props.unit.id, "lesson": id }));
}

function back() {
    router.get(route("units.index"));
}
</script>

<template>

    <Head title="Lessons" />

    <ApplicationLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Lessons
            </h2>
        </template>

        <div class="py-12">
            <div>
                <!-- ADD SOME STUFF HERE FOR SEARCH MAYBE? -->
            </div>

            <div class="p-6 flex justify-center w-full">
                <div class="flex flex-col w-8/12">
                    <div class="max-h-[40rem] overflow-y-scroll border border-gray-300 rounded-lg">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-800 text-white sticky top-0 z-10">
                                <tr>
                                    <th class="p-3 text-center w-1/3">Lesson Name</th>
                                    <th class="p-3 text-center w-1/6">Price</th>
                                    <th class="p-3 text-center w-1/6">File Count</th>
                                    <th class="p-3 text-center w-1/3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="(lesson, index) in lessons" :key="index" class="hover:bg-gray-100 transition">
                                    <td class="p-3 border border-gray-300 text-center">{{ lesson.name }}</td>
                                    <td class="p-3 border border-gray-300 text-center">${{ lesson.price }}</td>
                                    <td class="p-3 border border-gray-300 text-center">{{ lesson.file_count }}</td>
                                    <td class="p-3 border border-gray-300 text-center">
                                        <PrimaryButton @click="show(lesson.id)" class="mx-2">
                                            Files
                                        </PrimaryButton>
                                        <SecondaryButton @click="edit(lesson.id)" class="mx-2">
                                            Edit
                                        </SecondaryButton>
                                        <DangerButton @click="deleteLesson(lesson.id)" class="mx-2">
                                            Delete
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-between w-full my-6">
                        <PrimaryButton @click="newLesson">New Lesson</PrimaryButton>
                        <SecondaryButton @click="back">Back</SecondaryButton>
                    </div>
                </div>
            </div>
        </div>
    </ApplicationLayout>
</template>
