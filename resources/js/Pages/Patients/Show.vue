<template>
    <Head title="Patients" />
    <SideBarLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{}}
            </h2>
        </template>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Patient Information</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
                        </div>

                        <DescriptionList :fields="fields" :values="patient" resourceName="patient"/>
                    </div>
                </div>
            </div>
        </div>
    </SideBarLayout>
</template>

<script>
import SideBarLayout from '@/Layouts/SideBarLayout';
import { Head, Link } from '@inertiajs/inertia-vue3';
import DescriptionList from '@/Components/DescriptionList';

export default {
    name: "Patients.Show",
    components: {
        SideBarLayout,
        Head,
        Link,
        DescriptionList,
    },

    props: {
        patient: Object,
    },

    data() {
        return {
            fields: [
                {
                    'key': 'first_name',
                    'name': 'First name',
                },
                {
                    'key': 'last_name',
                    'name': 'Last name'
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
                {
                    'key': 'address',
                    'name': 'Address'
                },
            ]
        }
    }
}
</script>
