const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js').vue({ version: 3 })
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);

// mix new alias api
mix.alias({
    '@': path.resolve('resources/js'),
});

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                '__VUE_OPTIONS_API__': true,
                '__VUE_PROD_DEVTOOLS__': false
            })
        ],
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]'
        }
    };
});

if (mix.inProduction()) {
    mix.version();
} else {
    mix.sourceMaps();
}