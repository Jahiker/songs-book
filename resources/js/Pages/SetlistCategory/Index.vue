<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    title: {
        type: String
    },
    categories: {
        type: Object
    }
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ title }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold">{{ title }}</h3>
                        <Link class="py-1 px-3 bg-indigo-600 rounded-md text-gray-100"
                            :href="route('setlist-categories.create')">
                        Add
                        </Link>
                    </div>
                    <div class="px-6 py-4 text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900 rounded-lg mb-3"
                        v-for="category in categories.data">{{ category.name }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
