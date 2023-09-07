// webpack.config.js
const { VueLoaderPlugin } = require('vue-loader')

module.exports = {
  // ... other webpack configuration options
  module: {
    rules: [
      // ... other rules
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          compiler: require.resolve('vue-template-compiler'), // Point to the installed compiler
        },
      },
    ],
  },
  plugins: [
    // ... other plugins
    new VueLoaderPlugin(),
  ],
}
