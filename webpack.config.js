const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const autoprefixer      = require('autoprefixer');
const Clean = require('clean-webpack-plugin');
const path = require('path');

var mode =  process.env.NODE_ENV || 'development';

console.log("Building in "+mode+" mode...");

const sassLoaders = [
    'css-loader?'+(mode === 'production' ? '' : 'sourceMap&')+'-url',
    'postcss-loader',
    'sass-loader?'+(mode === 'production' ? '' : 'sourceMap&')+'-url'
];



var config = {
    addVendor: function (name, path) {
        this.resolve.alias[name] = path;
        this.module.noParse.push(new RegExp(path));
    },
    entry: {
        app: './src/javascripts/app'
    },
    devtool: (mode === 'production' ? null : 'source-map'),
    output: {
        path: path.join(__dirname, '/public'),
        filename: './js/[name].js',
        publicPath: '/'
    },
    module: {
        noParse:[],
        preLoaders: [
            // {
            //     test: /\.js$/,
            //     exclude: /node_modules/,
            //     loader: 'jshint-loader'
            //
            // }
        ],
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
        alias: { },
        extensions: ['', '.js', '.es6']
    },
    plugins: [
        new ExtractTextPlugin("./css/styles.css", { allChunks: true }),
        new Clean(['./public/css'])
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

module.exports = config;
