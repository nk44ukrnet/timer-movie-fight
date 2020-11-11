'use strict';
let path = require('path');

module.exports = {
    mode: 'development',
    entry: './js/index22common4.js',
    output: {
        filename: 'index22common5.js',
        path: __dirname + '/js'
    },
    watch: true,
    devtool: "source-map",
    module: {}
};