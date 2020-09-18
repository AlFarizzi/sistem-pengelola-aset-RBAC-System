const mix = require('laravel-mix');

mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/atlantis.min.css'
],'public/assets/gabung.css').version();

mix.scripts([
    'public/assets/js/core/jquery.3.2.1.min.js',
    'public/assets/js/core/popper.min.js',
    'public/assets/js/core/bootstrap.min.js',
    'public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'public/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
    'public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
    'public/assets/js/plugin/datatables/datatables.min.js',
    'public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
    'public/assets/js/plugin/sweetalert/sweetalert.min.js',
    'public/assets/js/atlantis.min.js',
    'public/assets/js/plugin/alpine/dist/alpine.js',
    'public/assets/js/plugin/axios/dist/axios.js',
    'public/assets/js/main.js',
],'public/assets/gabung.js').version();

