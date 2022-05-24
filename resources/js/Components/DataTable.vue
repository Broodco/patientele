<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th
                    scope="col"
                    :class="{
                        'py-3.5 text-left text-sm font-semibold text-gray-900': true,
                        'pl-4 pr-3 sm:pl-6': index === 0 || index === 2 ,
                        'hidden px-3  sm:table-cell': index !== 0 && index !== 2,
                    }"
                    v-for="(column, index) in columns"
                    :key="column.key"
                >
                    {{column.name}}
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            <tr v-for="row in rows" :key="row.id">
                <td
                    :class="{
                        'py-3.5 text-left text-sm font-medium text-gray-900': true,
                        'pl-4 pr-3 sm:pl-6': index === 0 || index === 2 ,
                        'hidden px-3  sm:table-cell': index !== 0 && index !== 2,
                    }"
                    v-for="(column, index) in columns"
                    :key="column.key"
                >
                    {{ row[column.key] }}
                </td>
                <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <Link :href="`/${resourceName}/${row.id}`" class="text-indigo-600 hover:text-indigo-900">
                        Details
                    </Link>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    columns: Array,
    rows: Array,
    resourceName: String,
});
</script>
