<script setup>
import { PaperClipIcon } from '@heroicons/vue/solid'

const props = defineProps({
    fields: Array,
    values: Object,
    resourceName: String,
});

</script>

<template>
    <div class="border-t border-gray-200">
        <dl>
            <div v-for="(field,index) in fields" key="field.key" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                 :class="[index % 2 === 0 ? 'bg-gray-50' : 'bg-white']"
            >
                <dt class="text-sm font-medium text-gray-500">{{field.name}}</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{values[field.key]}}</dd>
            </div>
        </dl>
    </div>
</template>
