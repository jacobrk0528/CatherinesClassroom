<script setup>
import { Head, router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import ApplicationLayout from '@/Layouts/ApplicationLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DangerButton from '@/Components/DangerButton.vue'

const props = defineProps(['units']);

function newUnit() {
    router.get(route('units.new'));
}

function edit(id) {
    router.get(route('units.edit', { "unit": id }));
}

function deleteUnit(id) {
    router.delete(route('units.destroy', { "unit": id }));
}
</script>

<template>

    <Head title="Units" />

    <ApplicationLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Units
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
                                    <th class="p-3 text-center w-1/3">Unit Name</th>
                                    <th class="p-3 text-center w-1/6">Price</th>
                                    <th class="p-3 text-center w-1/6">Lesson Count</th>
                                    <th class="p-3 text-center w-1/3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="(unit, index) in units" :key="index" class="hover:bg-gray-100 transition">
                                    <td class="p-3 border border-gray-300 text-center">{{ unit.name }}</td>
                                    <td class="p-3 border border-gray-300 text-center">${{ unit.price }}</td>
                                    <td class="p-3 border border-gray-300 text-center">{{ unit.lesson_count }}</td>
                                    <td class="p-3 border border-gray-300 text-center">
                                        <PrimaryButton @click="edit(unit.id)" class="mx-2">
                                            Lessons
                                        </PrimaryButton>
                                        <SecondaryButton @click="edit(unit.id)" class="mx-2">
                                            Edit
                                        </SecondaryButton>
                                        <DangerButton @click="deleteUnit(unit.id)" class="mx-2">
                                            Delete
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <PrimaryButton @click="newUnit">New Unit</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </ApplicationLayout>
</template>
