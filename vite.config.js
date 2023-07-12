import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import svgLoader from "vite-svg-loader";

export default defineConfig({
    ssr: {
        noExternal: [
            'vue-mention',
            'floating-vue'
        ]
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
                compilerOptions: {
                    isCustomElement: (tag) => ['md-italic', 'markdown-toolbar', 'md-bold', 'md-code', 'md-link', 'md-mention'].includes(tag),
                }
            },
        }),
        svgLoader({
            svgo: false
        }),
    ],
});
