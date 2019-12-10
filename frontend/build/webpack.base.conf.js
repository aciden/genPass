'use strict';
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');
const Dotenv = require('dotenv-webpack');
const NODE_ENV = process.env.NODE_ENV || 'development';
const CleanWebpackPlugin = require('clean-webpack-plugin')

function resolve (dir) {
    return path.join(__dirname, '..', dir);
}

module.exports = {
    context: path.resolve(__dirname, '../'),
    entry: {
        app: './src/application.js'
    },
    output: {
        path: resolve('public'),
        filename: NODE_ENV === 'development' ? '[name].js' : '[name]-[hash:6].js',
        publicPath: '/'
    },
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': NODE_ENV === 'development' ? 'vue/dist/vue.js' : 'vue/dist/vue.min.js',
            '@': resolve('src'),
        }
    },
    plugins: [
        new CleanWebpackPlugin(
            [
                'public'
            ],
            {
                root:     path.resolve(__dirname, '../'),
                exclude:  ['.gitkeep'],
                verbose:  true,
            }
        ),
        new HtmlWebpackPlugin({
            filename: 'index.html',
            template: 'build/index.pug',
            inject: true,
        }),
        new Dotenv({
            path: path.resolve('../.env'),
            safe: false,
            systemvars: false,
            silent: true
        }),
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: JSON.stringify(NODE_ENV)
            }
        }),
        // минифицируем, устраняя весь ненужный код
        new webpack.optimize.UglifyJsPlugin()

    ],
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.pug$/,
                use: 'pug-loader'
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                include: [resolve('src')]
            },
            {
                test: /\.scss$/,
                loader: ['css-loader', 'sass-loader']
            },
            {
                test: /\.sass/,
                loader: ['css-loader', 'sass-loader']
            },
            {
                test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                loader: 'url-loader',
                options: {
                    limit: 10000,
                    name: path.posix.join(resolve('public'), 'img/[name].[hash:7].[ext]')
                }
            },
            {
                test: /\.(mp4|webm|ogg|mp3|wav|flac|aac)(\?.*)?$/,
                loader: 'url-loader',
                options: {
                    limit: 10000,
                    name: path.posix.join(resolve('public'), 'media/[name].[hash:7].[ext]')
                }
            },
            {
                test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
                loader: 'url-loader',
                options: {
                    limit: 10000,
                    name: path.posix.join(resolve('public'), 'fonts/[name].[hash:7].[ext]')
                }
            }
        ]
    },
    devtool: 'eval-source-map'
};
