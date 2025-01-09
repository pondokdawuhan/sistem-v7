import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/region.js', 'resources/js/regionEdit.js', 'resources/js/fetchJadwal.js', 'resources/js/login.js'],
            refresh: true,
        }),
    ],
});
