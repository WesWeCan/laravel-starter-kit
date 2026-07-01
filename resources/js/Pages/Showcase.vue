<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AllElements from '@/Components/AllElements.vue';
import BasicLayout from '@/Layouts/BasicLayout.vue';

defineProps<{
    profileDefaults: {
        display_name: string;
        bio: string;
    };
}>();
</script>

<template>
    <BasicLayout>
        <Head title="Showcase" />
        <AllElements :profile-defaults="profileDefaults" />
    </BasicLayout>
</template>
