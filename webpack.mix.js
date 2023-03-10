const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('resources/js/app.js','public/js/app.js')
    .js('resources/js/admin/bans.js','public/js/admin/bans.js')
    .js('resources/js/admin/searchUsers.js','public/js/admin/searchUsers.js')
    .js('resources/js/user/invites.js','public/js/user/invites.js')
    .js('resources/js/project/invites.js','public/js/project/invites.js')
    .js('resources/js/task/comments.js','public/js/task/comments.js')
    .js('resources/js/popup-test.js','public/js/popup-test.js');
