<?php
add_action('wp_enqueue_scripts', function(){
    // load style css :
    wp_enqueue_style(
        'main-css',
        get_theme_file_uri('assets/css/style.css'),
    );
    // // load js :
    wp_enqueue_script(
        'main-js',
        get_theme_file_uri('assets/js/app.js'), 
        [],
        false,
        true
    );
});