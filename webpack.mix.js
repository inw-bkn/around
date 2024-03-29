const mix = require('laravel-mix');
var LiveReloadPlugin = require('webpack-livereload-plugin');

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 3, runtimeOnly: true })
    .extract()
    .alias({ '@': 'resources/js' })
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .webpackConfig(webpack => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    '__VUE_OPTIONS_API__': true,
                    '__VUE_PROD_DEVTOOLS__': false
                }),
                new LiveReloadPlugin()
            ],
            output: { // use split code
                chunkFilename: 'js/[name].js?id=[chunkhash]',
            }
        };
    })
    .sourceMaps(false)
    .version()
    .disableSuccessNotifications();
