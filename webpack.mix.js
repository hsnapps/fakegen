const mix = require('laravel-mix');

// mix.webpackConfig({
//     resolve: {
//         modules: [
//             path.resolve(__dirname, 'vendor/laravel/spark/resources/assets/js')
//         ]
//     }
// });

mix.scripts([
        'node_modules/uikit/dist/JS/uikit.js',
        'node_modules/uikit/dist/JS/uikit-icons.js',
    ], 'public/js/app.js')
    .sass('resources/scss/app.scss', 'public/css')
    .version();