const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const autoprefixer      = require('autoprefixer');
const Clean = require('clean-webpack-plugin');
const path = require('path');
const sassLoaders = [
    'css-loader?sourceMap',
    'postcss-loader',
    'sass-loader?sourceMap'
];


module.exports = {
    entry: {
        app: './src/javascripts/app'
    },
    devtool: 'source-map',
    output: {
        path: __dirname,
        filename: './public/js/[name].js',
        publicPath: '/public/'
    },
    module: {
        loaders: [
            {
                test: /\.es6?$/,
                exclude: /(node_modules|vendor)/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.(eot|svg|ttf|woff|woff2)$/,
                loader: 'file?name=public/fonts/[name].[ext]'
            },
            {
                test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff&name=public/fonts/[name].[ext]"
            }, {
                test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff&name=public/fonts/[name].[ext]"
            }, {
                test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/octet-stream&name=public/fonts/[name].[ext]"
            }, {
                test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
                loader: "file?name=public/fonts/[name].[ext]"
            }, {
                test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=image/svg+xml&name=public/fonts/[name].[ext]"
            },
            {
                test: /\.jpe?g$|\.gif$|\.png$/i,
                loader: "file?name=public/images/[name].[ext]"
            },
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style-loader', sassLoaders.join('!'))
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader?sourceMap")
            }
        ]
    },
    resolve: {
        extensions: ['', '.js', '.es6']
    },
    plugins: [
        new ExtractTextPlugin("./public/css/styles.css", { allChunks: true }),
        new Clean(['./public/css', './public/js', './public/fonts'])
    ],
    sassLoader: {
        includePaths: [ 'src/css' ]
    },
    postcss: [
        autoprefixer({
            browsers: ['last 2 versions']
        })
    ]
};
