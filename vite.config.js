import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',

                //admin theme css
                   'resources/assets/vendors/mdi/css/materialdesignicons.min.css',
                'resources/assets/vendors/css/vendor.bundle.base.css',
                'resources/assets/css/style.css',
                'resources/assets/images/favicon.png',
                
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
