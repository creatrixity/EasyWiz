var path = require('path');

module.exports = {
    resolve: {
        root: path.resolve('./'),
        alias: {
            'vue$': 'vue/dist/vue.common.js'
        }
    },
}
