const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBar = require('webpackbar');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// https://webpack.js.org/guides/entry-advanced/#multiple-file-types-per-entry
module.exports = {
    // assets for work
    entry: {
        project: [
            './src/js/scripts.js',
            './src/scss/style.scss'
        ],
    },
    // final assets
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: 'js/scripts.js',
        assetModuleFilename: 'images/[name].[hash][ext]'
    },
    plugins: [
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 8888,
            files: ['./*.php'],
            proxy: 'http://localhost:3000/'
        }),
        new MiniCssExtractPlugin({
            filename: '../assets/css/styles.css',
            chunkFilename: '../[id].css',
        }),
        new WebpackBar()
    ],
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    // https://github.com/webpack-contrib/mini-css-extract-plugin#publicPath
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {}
                    },
                    // The css-loader interprets @import and url() like import/require() and will resolve them.
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                        }
                    },
                    // Loads a Sass/SCSS file and compiles it to CSS.
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            // https://webpack.js.org/guides/asset-management/
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource'
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource'
            },
        ]
    }
};
