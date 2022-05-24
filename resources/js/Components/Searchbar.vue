<script setup>
import {SearchIcon, FilterIcon} from '@heroicons/vue/solid';
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
import debounce from "lodash/debounce";

const props = defineProps({
    search: String,
})

let search = ref(props.search);

watch(search, debounce(() => {
    Inertia.get(usePage().url.value, {search: search.value}, {
        preserveState: true,
        replace: true,
    })
    }, 300)
);
</script>

<template>
    <div class="mt-6 flex space-x-4" action="#">
        <div class="flex-1 min-w-0">
            <label for="search" class="sr-only">Search</label>
            <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </div>
                <input
                    type="search"
                    name="search"
                    id="search"
                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                    placeholder="Filter names"
                    v-model="search"
                />
            </div>
        </div>
    </div>
</template>

