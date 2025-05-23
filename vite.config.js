import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/icons.css' // أضف مسار icons.css هنا
            ],
            refresh: true,
        }),
    ],
});
