const Encore = require('./webpack.base.config');

process.env.BROWSERSLIST_ENV = 'modern';
Encore
    .setOutputPath('public/modern-build/')
    .setPublicPath('/modern-build')
;

const config = Encore.getWebpackConfig();
config.name = 'modern';

module.exports = config;
