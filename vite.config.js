import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';
import cesium from 'vite-plugin-cesium';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default defineConfig(({ command }) => ({
    resolve: {
        alias: {
            'cesium': path.resolve(__dirname, 'resources/js/viewer/cesium-wrapper.js')
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/viewer/main.tsx'
            ],
            refresh: true,
        }),
        react(),
        cesium({
            cesiumBaseUrl: command === 'serve' ? 'http://127.0.0.1:5173/cesium/' : '/build/cesium/'
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
}));
