const mix = require('laravel-mix');

/**
 * CSS *
 */

/** Vendors */
mix.styles([
    'resources/assets/vendor/fontawesome-free/css/all.min.css',
    'resources/assets/vendor/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/assets/vendor/datatables/css/dataTables.bootstrap4.min.css',
    'resources/assets/vendor/select2/css/select2.min.css',
    'resources/assets/vendor/adminlte/dist/css/adminlte.min.css',
    'resources/assets/vendor/font-google/css2.css'
], 'public/css/vendors.css');


/** Site */
mix.styles([
    'resources/assets/css/site/all.css'
], 'public/css/site/all.min.css');


/**
 * JS *
 */


/** Vendors */
mix.scripts([
    'resources/assets/vendor/jquery/jquery.min.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/assets/vendor/jquery-mask/jquery.mask.min.js',
    'resources/assets/vendor/typeahead/typeahead.min.js',
    'resources/assets/vendor/datatables/js/jquery.dataTables.min.js',
    'resources/assets/vendor/select2/js/select2.min.js',
    'resources/assets/vendor/adminlte/dist/js/adminlte.min.js',
    'resources/assets/vendor/jquery/jquery.validate.min.js'
], 'public/js/vendors.js');

/** Site */
mix.scripts([
    'resources/assets/js/site/all.js',
], 'public/js/site/all.min.js');