<?php 

function zumbaChristèle_scripts() {

    wp_enqueue_style(
        'zumbaChristèle-style',
        get_theme_file_uri ('/public/css/style.css'),
        [],
        '0.0.1'
    );

    wp_enqueue_script(
        'zumbaChritèle-app',
        get_theme_file_uri('/public/js/app.js'),
        [],
        '0.0.1',
        true
    );
}

add_action('wp_enqueue_scripts', 'zumbaChristèle_scripts');