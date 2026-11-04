<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AllElements from '@/Components/Showcase/AllElements.vue';
import BasicLayout from '@/Layouts/BasicLayout.vue';
import type { ProfileDefaults } from '@/types/showcase';

defineProps<{
    profileDefaults: ProfileDefaults;
}>();
</script>

<template>
    <BasicLayout>
        <Head title="Showcase" />
        <AllElements :profile-defaults="profileDefaults" />
    </BasicLayout>
</template>
