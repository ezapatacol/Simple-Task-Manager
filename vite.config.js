import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Required to accept connections from outside the container
        port: 5173,
        hmr: {
        host: 'localhost', // Set to your host machine or use ngrok/domain if remote
        },
    },
});
