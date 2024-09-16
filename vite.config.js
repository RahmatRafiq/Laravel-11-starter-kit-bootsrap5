import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/dropzoner.js'
            ],
            refresh: true,
        }),
    ],
    // no hashing output
    build: {
        // target esmodule
        target: 'esnext',
        rollupOptions: {
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].css',
            }
        },
    },
    esbuild: {
        drop: ['console', 'debugger']
    }
});
