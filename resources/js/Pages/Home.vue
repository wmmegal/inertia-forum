<script setup>
import {Head} from '@inertiajs/vue3';
import ForumLayout from "@/Layouts/ForumLayout.vue";
</script>

<template>
    <Head title="Forum" />

    <ForumLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center space-x-3">

                </div>
            </div>

        </div>

        <template #header>
            side
        </template>
        <template #side>
            side
        </template>
    </ForumLayout>
</template>
