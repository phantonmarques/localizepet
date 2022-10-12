const mix = require('laravel-mix');

/// TODO: Site

/**
 * CSS
 */
mix.sass('resources/assets/sass/site/all.scss', 'public/css/site/');

mix.styles([
    'public/vendor/bootstrap/css/bootstrap.min.css',
    'public/vendor/icheck-bootstrap/icheck-bootstrap.min.css',
    'public/vendor/select2/css/select2.min.css',
], 'public/css/site/vendors.css');

    /* User */
    mix.sass('resources/assets/sass/site/user/create.scss', 'public/css/site/user/');

/**
 * JS
 */
mix.js([
    'resources/assets/js/site/all.js',
], 'public/js/site/all.js');

mix.scripts([
    'public/vendor/bootstrap/js/bootstrap.min.js',
    'public/vendor/fontawesome/js/all.min.js',
    'public/vendor/jquery/jquery.min.js',
    'public/vendor/jquery-browser-mobile/jquery.browser.mobile.js',
    'public/vendor/jquery-mask/jquery.mask.min.js',
    'public/vendor/jquery-validation/jquery.validate.js',
    'public/vendor/jquery-placeholder/jquery.placeholder.js',
    'public/vendor/select2/js/select2.min.js',
], 'public/js/site/vendors.js');

    /* User */
    mix.scripts([
        'resources/assets/js/site/user/create.js',
    ], 'public/js/site/user/create.js');



/// TODO: Administrator

/**
 * CSS
 */
mix.sass('resources/assets/sass/administrator/all.scss', 'public/css/administrator/');

mix.styles([
    'public/vendor/bootstrap-administrator/css/bootstrap.min.css',
    'public/vendor/magnific-popup/magnific-popup.css',
    'public/vendor/select2/css/select2.css',
    'public/vendor/select2-bootstrap-theme/select2-bootstrap.min.css',
    'public/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css',
    'public/vendor/datatables/media/css/dataTables.bootstrap5.css',
    'public/vendor/portoadmin/css/theme.css',
    'public/vendor/portoadmin/css/skin-default.css',
], 'public/css/administrator/vendor.css');

/**
 * JS
 */
mix.js([
    'resources/assets/js/administrator/all.js',
], 'public/js/administrator/all.js');

mix.scripts([
    'public/vendor/jquery/jquery.min.js',
    'public/vendor/jquery-appear/jquery.appear.js',
    'public/vendor/jquery-browser-mobile/jquery.browser.mobile.js',
    'public/vendor/jquery-placeholder/jquery.placeholder.js',
    'public/vendor/jquery.easy-pie-chart/jquery.easypiechart.js',
    'public/vendor/jquery-mask/jquery.mask.min.js',
    'public/vendor/bootstrap-administrator/js/bootstrap.bundle.min.js',
    'public/vendor/bootstrapv5-multiselect/js/bootstrap-multiselect.js',
    'public/vendor/common/common.js',
    'public/vendor/nanoscroller/nanoscroller.js',
    'public/vendor/magnific-popup/jquery.magnific-popup.js',
    'public/vendor/modernizr/modernizr.js',
    'public/vendor/datatables/media/js/jquery.dataTables.min.js',
    'public/vendor/datatables/media/js/dataTables.bootstrap5.min.js',
    'public/vendor/ios7/ios7-switch.js',
    'public/vendor/popper/umd/popper.min.js',
    'public/vendor/select2/js/select2.min.js',
    'public/vendor/sweetalert/sweetalert2.all.min.js',
    'public/vendor/portoadmin/js/theme.js',
    'public/vendor/portoadmin/js/theme.init.js',
], 'public/js/administrator/vendor.js');

    /* Home */
    mix.js([
        'resources/assets/js/administrator/dashboard.js',
    ], 'public/js/administrator/dashboard.js');

    /* Permission */
    mix.js([
        'resources/assets/js/administrator/permission/list.js',
    ], 'public/js/administrator/permission/list.js');

    /* Role */
    mix.js([
        'resources/assets/js/administrator/role/list.js',
    ], 'public/js/administrator/role/list.js');

    /* User */
    mix.js([
        'resources/assets/js/administrator/user/list.js',
    ], 'public/js/administrator/user/list.js');

    mix.js([
        'resources/assets/js/administrator/user/create.js',
    ], 'public/js/administrator/user/create.js')

// TODO: Images Defaults

// Site and Administrator
.copyDirectory('resources/assets/images/default', 'public/images/default')
.copyDirectory('resources/assets/images/icons', 'public/images/icons')
.copyDirectory('resources/assets/images/icons-svg', 'public/images/icons-svg');
