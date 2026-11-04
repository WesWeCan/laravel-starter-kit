import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import inertia from '@inertiajs/vite';
import vue from '@vitejs/plugin-vue';
import vueDevTools from 'vite-plugin-vue-devtools';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            refresh: true,
            // @fonts in the root view renders these; alias "body" owns --font-body.
            fonts: [
                bunny('Noto Sans', {
                    alias: 'body',
                    weights: [400, 500, 700, 900],
                    styles: ['normal', 'italic'],
                    preload: [{ weight: 400 }],
                    fallbacks: ['sans-serif'],
                }),
            ],
        }),
        inertia(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        vueDevTools({
            appendTo: 'resources/js/app.ts',
        }),
    ],
    assetsInclude: ['**/*.glsl'],
    server: {
        watch: {
            // Compiled Blade views and agent state files would otherwise trigger full reloads.
            ignored: ['**/storage/framework/views/**', '**/.claude/**'],
        },
    },
});
