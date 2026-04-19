import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // Make sure you have this!

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/gallery.jsx' // Add your new bridge file here
            ],
            refresh: true,
        }),
        react(),
    ],
});