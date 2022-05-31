<template>
    <Head title="Patients" />
    <SideBarLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patients
            </h2>
        </template>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Patients</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all your patients.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <Link :href="'/patients/create'">
                        <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add patient</button>
                    </Link>
                </div>
            </div>
            <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
                <div class="flex justify-between">
                    <Searchbar class="pl-3 mb-2" :search="filters.search" />
                    <div></div>
                </div>
                <DataTable :columns="columns" :rows="patients.data" resource-name="patients"/>
                <Pagination
                    :from="patients.from"
                    :to="patients.to"
                    :total="patients.total"
                    :links="patients.links"
                />
            </div>
        </div>
    </SideBarLayout>
</template>

<script>
import SideBarLayout from '@/Layouts/SideBarLayout';
import { Head, Link } from '@inertiajs/inertia-vue3';
import DataTable from '@/Components/DataTable';
import Pagination from '@/Components/Pagination';
import Searchbar from "@/Components/Searchbar";

export default {
    name: "Patients.Index",
    components: {
        SideBarLayout,
        Head,
        DataTable,
        Pagination,
        Searchbar,
        Link,
    },

    props: {
        patients: Object,
        filters: Object
    },

    data() {
        return {
            columns: [
                {
                    'key': 'name',
                    'name': 'Name'
                },
                {
                    'key': 'gender',
                    'name': 'Gender'
                },
                {
                    'key': 'birth_date',
                    'name': 'Birth Date'
                },
                {
                    'key': 'birth_place',
                    'name': 'Birth Place'
                },
            ]
        }
    }
}
</script>
