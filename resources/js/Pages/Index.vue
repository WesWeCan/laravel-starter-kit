<script setup lang="ts">
import { ref } from 'vue';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiHumanGreetingVariant } from '@mdi/js';
import BasicLayout from '@/Layouts/BasicLayout.vue';

const count = ref(0);

function increment() {
    count.value++;
}
</script>

<template>
    <BasicLayout>
        <section>
            <h1><svg-icon type="mdi" :path="mdiHumanGreetingVariant" :size="24"></svg-icon>Hello World</h1>
            <button @click="increment">Pressed {{ count }} times</button>
        </section>
    </BasicLayout>
</template>