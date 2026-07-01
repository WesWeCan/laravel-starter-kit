<script setup lang="ts">
import { ref } from 'vue';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiHumanGreetingVariant } from '@mdi/js';
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Link } from '@inertiajs/vue3';

const count = ref(0);

function increment() {
    count.value++;
}
</script>

<template>
    <BasicLayout>
        <section>
            <h1 dusk="home-heading"><svg-icon type="mdi" :path="mdiHumanGreetingVariant" :size="24"></svg-icon>Hello World</h1>
            <button dusk="home-counter" @click="increment">Pressed {{ count }} times</button>



            <br> <br>
            <Link href="/showcase" as="button">Showcase</Link>


        </section>
    </BasicLayout>
</template>