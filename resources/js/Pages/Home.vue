<template>
    <Head title="Home" />
    <SideBarLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        Hello World!

    </SideBarLayout>
</template>

<script>
import SideBarLayout from '@/Layouts/SideBarLayout';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: "Home",
    components: {
        SideBarLayout,
        Head,
    }

}
</script>
