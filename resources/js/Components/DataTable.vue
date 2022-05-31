<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3';
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {ChevronDownIcon, ChevronUpIcon } from "@heroicons/vue/solid";

let params= ref({
    field: null,
    direction: null
});

watch(params, (value, prevValue) => {
    Inertia.get(usePage().url.value, params.value, {
        preserveState: true,
        replace: true,
    });
    },
    {deep: true}
);

function sort(field) {
    console.log(field);
    params.value.field = field;
    params.value.direction = params.value.direction === 'asc' ? 'desc' : 'asc';
}

const props = defineProps({
    columns: Array,
    rows: Array,
    resourceName: String,
});

</script>

<template>
    <table class="min-w-full divide-y divide-gray-300 table-fixed">
        <thead class="bg-gray-50">
            <tr>
                <th
                    scope="col"
                    :class="{
                        'py-3.5 mr-1 text-left text-sm font-semibold text-gray-900 w-1/4' : true,
                        'pl-4 pr-3 sm:pl-6': index === 0 || index === 2 ,
                        'hidden px-3  sm:table-cell': index !== 0 && index !== 2,
                    }"
                    v-for="(column, index) in columns"
                    :key="column.key"
                >
                    <button
                        @click="sort(column.key)"
                        class="group inline-flex cursor-pointer"
                    >
                        {{column.name}}
                        <span class="ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300">
                            <ChevronUpIcon v-if="params.field === column.key && params.direction === 'asc'" class="h-5 w-5" aria-hidden="true"/>
                            <ChevronDownIcon v-if="params.field === column.key && params.direction === 'desc'" class="h-5 w-5" aria-hidden="true"/>
                        </span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            <tr v-for="row in rows" :key="row.id" >
                <td
                    :class="{
                        'py-3.5 text-left text-sm font-medium text-gray-900': true,
                        'pl-4 pr-3 sm:pl-6': index === 0 || index === 2 ,
                        'hidden px-3  sm:table-cell': index !== 0 && index !== 2,
                    }"
                    v-for="(column, index) in columns"
                    :key="column.key"
                >
                    <Link :href="`/${props.resourceName}/${row.id}/`">
                        {{ row[column.key] }}
                    </Link>
                </td>
            </tr>
        </tbody>
    </table>
</template>
