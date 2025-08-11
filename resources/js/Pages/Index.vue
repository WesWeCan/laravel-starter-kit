<script setup lang="ts">
import { ref } from 'vue';
import BasicLayout from '@/Layouts/BasicLayout.vue';

const count = ref(0);

function increment() {
    count.value++;
}
</script>

<template>
    <BasicLayout>
        <section>
            <h1>Hello World</h1>
            <button @click="increment">Pressed {{ count }} times</button>
        </section>
    </BasicLayout>
</template>