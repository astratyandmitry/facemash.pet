import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const vue = require('@vitejs/plugin-vue');

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
