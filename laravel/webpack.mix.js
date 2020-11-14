const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    // .js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css')

    .styles('resources/css/layout.css', 'public/css/layout.css')
    .scripts('resources/js/global.js', 'public/js/global.js')

    //

    .styles([
        'resources/css/card.css',
        'resources/css/carousel.css',
        'resources/css/main.css',
    ], 'public/css/main.css')
    .scripts('resources/js/carousel.js', 'public/js/main.js')

    //

    .styles([
        'resources/css/cartAndFavorites.css',
        'resources/css/productRow.css',
        'resources/css/boxOfNumbers.css',
    ], 'public/css/cartAndFavorites.css')
    .scripts('resources/js/boxOfNumbers.js', 'public/js/cartAndFavorites.js')

    //

    .styles([
        'resources/css/product.css',
        'resources/css/boxOfNumbers.css',
        'resources/css/carousel.css',
        'resources/css/card.css',
    ], 'public/css/product.css')
    .scripts([
        'resources/js/product.js',
        'resources/js/boxOfNumbers.js',
        'resources/js/carousel.js',
    ], 'public/js/product.js')

    //

    .styles('resources/css/comment.css', 'public/css/comment.css')

    //

    .styles('resources/css/emailVerification.css', 'public/css/emailVerification.css')
    .scripts('resources/js/emailVerification.js', 'public/js/emailVerification.js')

    //

    .styles('resources/css/frete.css', 'public/css/frete.css')

    //

    .styles('resources/css/login.css', 'public/css/login.css')

    //

    .styles([
        'resources/css/card.css',
        'resources/css/page.css',
        'resources/css/carousel.css',
    ], 'public/css/page.css')
    .scripts('resources/js/carousel.js', 'public/js/page.js')

    //

    .styles('resources/css/paymentConfirmed.css', 'public/css/paymentConfirmed.css')

    //

    .styles([
        'resources/css/paymentReview.css',
        'resources/css/productRow.css',
    ], 'public/css/paymentReview.css')

    //

    .styles('resources/css/paymethod.css', 'public/css/paymethod.css')
    .scripts('resources/js/paymethod.js', 'public/js/paymethod.js')

    //

    .styles('resources/css/register.css', 'public/css/register.css')
    .scripts([
        'node_modules/vanilla-masker/build/vanilla-masker.min.js',
        'resources/js/mask.js',
        'resources/js/register.js',
    ], 'public/js/register.js')

    //

    .styles([
        'resources/css/user/ads.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/ads.css')

    //

    .styles([
        'resources/css/user/config.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/config.css')
    .scripts('resources/js/config.js', 'public/js/config.js')

    //

    .styles([
        'resources/css/user/createAddressOfAd.css',
        'resources/css/sidebar.css',
        'resources/css/createOrChangeAddress.css',
    ], 'public/css/user/createAddressOfAd.css')
    .scripts('resources/js/createOrChangeAddress.js', 'public/js/createAddressOfAd.js')

    //

    .styles([
        'resources/css/user/createProductOfAd.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/createProductOfAd.css')
    .scripts('resources/js/createProductOfAd.js', 'public/js/createProductOfAd.js')

    //

    .styles([
        'resources/css/user/creationOfFinishedAd.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/creationOfFinishedAd.css')

    //

    .styles([
        'resources/css/user/sales.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/sales.css')

    //

    .styles([
        'resources/css/user/salesDetails.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/salesDetails.css')

    //

    .styles([
        'resources/css/user/selectWayToGetPaidOfAd.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/selectWayToGetPaidOfAd.css')
    .scripts('resources/js/selectWayToGetPaidOfAd.js', 'public/js/selectWayToGetPaidOfAd.js')

    //

    .styles([
        'resources/css/user/shopping.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/shopping.css')

    //

    .styles([
        'resources/css/user/shoppingDetails.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/shoppingDetails.css')

    //

    .styles([
        'resources/css/user/warrantyOfAd.css',
        'resources/css/sidebar.css',
    ], 'public/css/user/warrantyOfAd.css')

    // node_modules
    // .copy('node_modules/vanilla-masker/build/vanilla-masker.min.js', 'public/js/node_modules');
