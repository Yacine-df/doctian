import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/formStepper.css',  
                'resources/js/formStepper.js',
                'resources/js/agora.js'
            ],
            refresh: false,
        }),
    ],
});
