import { defineConfig } from "vite";
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    base: '/wp-content/themes/skeleton/public/dist/',
	server: {
        port: 5173,
        host: true,
        cors: true,
        strictPort: true,
        hmr: {
          host: 'localhost'
        }
    },
    resolve: {
        alias: {
          '~bootstrap': resolve(__dirname, 'node_modules/bootstrap'),
          '~fontawesome': resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
        }
    },
    build: {
        chunkSizeWarningLimit: 800
    },
    css: {
        postcss: resolve(__dirname, 'postcss.config.js')
    },
    plugins: [
        laravel({
            input: ['src/js/app.js', 'src/css/app.css', 'src/js/app-bs.js', 'src/scss/app-bs.scss', 'src/css/app-fa.css'],
            refresh: [
                'src/**/*',
                'themes/skeleton/**/*.php',
            ],
            buildDirectory: 'dist',
            publicDirectory: 'themes/skeleton/public',
        }),
    ],
    assetsInclude: ['**/*.ttf', '**/*.woff', '**/*.woff2', '**/*.eot', '**/*.svg']
});