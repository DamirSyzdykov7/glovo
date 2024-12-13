import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import { resolve } from 'path';
import inspect from 'vite-plugin-inspect';

export default defineConfig({
    plugins: [
        inspect(),
        react(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources/js'),
        },
    }
});
