import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/index.css',
                'resources/css/about.css',
                'resources/css/photoalbum.css',
                'resources/css/contact.css',
                'resources/css/interests.css',
                'resources/css/test.css',
                'resources/css/guestbook.css',
                'resources/css/upload.css',
                'resources/css/blog-editor.css',
                'resources/css/blog.css',
                'resources/css/upload-blog.css',
                'resources/css/visitors.css',
                'resources/css/log_admin.css',
                'resources/css/reg_user.css',
                'resources/css/log_user.css',

                'resources/js/onload.js',
                'resources/js/writeText.js'
            ],
            refresh: true,
        }),
    ],
});
