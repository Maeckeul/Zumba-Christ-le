<?php

if (!function_exists('zumba_setup')):

    function zumba_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support( 'menus' );

        register_nav_menus([
            'menu_header' => __('Menu de navigation en haut de la page', 'zumba'),
            'social' => __('Menu des réseaux sociaux situé en pied de page', 'zumba'),
        ]);

       
    }

endif;

add_action('after_setup_theme', 'zumba_setup');