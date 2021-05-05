const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js");
mix.js("resources/js/loginRegister.js", "public/js");
mix.js("resources/js/admin/adminDashboard.js", "public/js");
mix.js("resources/js/admin/approveRegistrasi.js", "public/js");
mix.js("resources/js/admin/approveTransaksi.js", "public/js");
mix.js("resources/js/admin/approveWithdraw.js", "public/js");
mix.js("resources/js/admin/listShowroom.js", "public/js");
mix.js("resources/js/user/userDashboard.js", "public/js");
mix.js("resources/js/user/userTransaksiInput.js", "public/js");
mix.js("resources/js/user/userReward.js", "public/js");
mix.js("resources/js/user/userTransaksiHistory.js", "public/js");
mix.js("resources/js/user/userProfile.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/loginRegister.scss", "public/css")
    .sass("resources/sass/sidebar.scss", "public/css")
    .sass("resources/sass/userDashboard.scss", "public/css")
    .sass("resources/sass/adminStyle.scss", "public/css")
    .sass("resources/sass/userInputTransaksi.scss", "public/css")
    .sass("resources/sass/userHistoryTransaksi.scss", "public/css")
    .sass("resources/sass/userReward.scss", "public/css")
    .sass("resources/sass/userRewardChart.scss", "public/css")
    .sass("resources/sass/userProfile.scss", "public/css")
    .sass("resources/sass/barChart.scss", "public/css")
    .sass("resources/sass/adminDashboard.scss", "public/css")
    .sass("resources/sass/dashboardUtama.scss", "public/css");
