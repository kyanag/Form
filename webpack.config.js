const path = require('path');
const UglifyPlugin = require('uglifyjs-webpack-plugin')
const HtmlWebpackPlugin = require("html-webpack-plugin")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
    entry: path.join(__dirname,'dist/js/tabler-form.js'),

    output: {
        path: path.resolve(__dirname, 'build'),
        filename: 'bundle.js',
    },
    mode: 'development',
    target:"electron-renderer",
    module: {
        rules: [
            {
                test: /\.js$/,
                include: [
                    path.resolve(__dirname, 'dist/js/')
                ],
                use: 'babel-loader',
            },
            {
                test: /\.css/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    'css-loader'
                ]
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    'css-loader',
                    'sass-loader'
                ]
            },
        ],
    },

    // // 代码模块路径解析的配置
    // resolve: {
    //   modules: [
    //     "node_modules",
    //     path.resolve(__dirname, 'src')
    //   ],

    //   extensions: [".wasm", ".mjs", ".js", ".json", ".jsx"],
    // },

    plugins: [
        new MiniCssExtractPlugin(),
        // 使用 uglifyjs-webpack-plugin 来压缩 JS 代码
        new UglifyPlugin()
    ]
}