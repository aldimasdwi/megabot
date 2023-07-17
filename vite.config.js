import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/admin/scss/admin.scss',
                'resources/assets/frontend/scss/color1.scss',
                'resources/js/app.js',
            ],
        }),
        {
            name: 'blade',
            handleHotUpdate({
                file,
                server
            }) {
                if (file.endsWith('.blade.php', '.scss')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
});
