import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import UnoCSS from "unocss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',"resources/js/buildChart.js",],
            refresh: true,
        }),
        UnoCSS(),
    ],
    server: {
        cors: true,
    },
});