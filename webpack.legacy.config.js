const Encore = require('./webpack.base.config');

process.env.BROWSERSLIST_ENV = 'legacy';
Encore
    .setOutputPath('public/legacy-build/')
    // public path used by the web server to access the output path
    .setPublicPath('/legacy-build')
;

const config = Encore.getWebpackConfig();
config.name = 'legacy';

module.exports = config;
