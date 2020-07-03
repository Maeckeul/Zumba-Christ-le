<?php

/*
Plugin Name: Zumba CPT
Description: Mise en place des CPT pour le thème Zumba
Author: Davy
Version: 0.1
*/

// Sécuriser le plugin
if (!defined('WPINC')) {die();}

class zumbaCPT
{
  public function __construct()
  {
    add_action('init', [$this, 'registerActivity']);
    add_action('init', [$this, 'registerIntro']);
    add_action('init', [$this, 'registerPictures']);
    add_action('init', [$this, 'registerVideos']);
    add_action('init', [$this, 'registerPrice']);


    
  }

  public function registerIntro()
  {
    $labels = [
      'name'               => 'Introductions',
      'singular_name'      => 'Introduction',
      'menu_name'          => 'Introduction',
      'name_admin_bar'     => 'Intro',
      'add_new'            => 'Ajouter une introduction',
      'add_new_item'       => 'Ajouter une nouvelle introduction',
      'new_item'           => 'Nouvelle introduction',
      'edit_item'          => 'Editer',
      'view_item'          => 'Voir introduction',
      'all_items'          => 'Voir toute les introductions',
      'search_items'       => 'Rechercher une introduction',
      'not_found'          => 'Aucune introduction trouvée',
      'not_found_in_trash' => 'Aucune introduction trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
      'menu_position' => 3,
      'menu_icon' => 'dashicons-info',
      'supports' => [
        'title',
        'editor',
        'thumbnail',
      ],
      
    ];

    register_post_type(
      'introduction',
      $args
    );
  }
  

  public function registerActivity()
  {
    $labels = [
      'name'               => 'Activités',
      'singular_name'      => 'Activité',
      'menu_name'          => 'Activités',
      'name_admin_bar'     => 'Activité',
      'add_new'            => 'Ajouter une activité',
      'add_new_item'       => 'Ajouter une nouvelle activité',
      'new_item'           => 'Nouvelle activité',
      'edit_item'          => 'Editer une activité',
      'view_item'          => 'Voir la activité',
      'all_items'          => 'Voir toutes les activités',
      'search_items'       => 'Rechercher une activité',
      'not_found'          => 'Aucune activité trouvée',
      'not_found_in_trash' => 'Aucune activité trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => false,
      'exclude_from_search' => true,
      'publicly_queryable' => false,
      'menu_position' => 4,
      'menu_icon' => 'dashicons-universal-access',
      'supports' => [
        'title',
        'editor',
        'custom-fields',
        'thumbnail',
      ]
    ];

    register_post_type(
      'activity',
      $args
    );
  }

  public function registerPictures()
  {
    $labels = [
      'name'               => 'Photos',
      'singular_name'      => 'Photo',
      'menu_name'          => 'Photos',
      'name_admin_bar'     => 'Pics',
      'add_new'            => 'Ajouter une photo',
      'add_new_item'       => 'Ajouter une nouvelle introduction',
      'new_item'           => 'Nouvelle photo',
      'edit_item'          => 'Editer',
      'view_item'          => 'Voir les photos',
      'all_items'          => 'Voir toute les photos',
      'search_items'       => 'Rechercher une photo',
      'not_found'          => 'Aucune photo trouvée',
      'not_found_in_trash' => 'Aucune photo trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-camera-alt',
      'supports' => [
        'title',
        'thumbnail',
      ],
      
    ];

    register_post_type(
      'photos',
      $args
    );
  }

  public function registerVideos()
  {
    $labels = [
      'name'               => 'videos',
      'singular_name'      => 'Video',
      'menu_name'          => 'Video',
      'name_admin_bar'     => 'Video',
      'add_new'            => 'Ajouter un lien vers une video',
      'add_new_item'       => 'Ajouter un lien vers une video',
      'new_item'           => 'Nouvelle video',
      'edit_item'          => 'Editer',
      'view_item'          => 'Voir les videos',
      'all_items'          => 'Voir tout les liens vers les vidéos',
      'search_items'       => 'Rechercher une vidéo',
      'not_found'          => 'Aucune vidéo trouvée',
      'not_found_in_trash' => 'Aucune vidéo trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
      'menu_position' => 6,
      'menu_icon' => 'dashicons-format-video',
      'supports' => [
        'title',
        'editor',
      ],
      
    ];

    register_post_type(
      'videos',
      $args
    );
  }

  public function registerPrice()
  {
    $labels = [
      'name'               => 'Tarifs',
      'singular_name'      => 'Tarif',
      'menu_name'          => 'Tarifs',
      'name_admin_bar'     => 'Tarif',
      'add_new'            => 'Ajouter un tarif',
      'add_new_item'       => 'Ajouter un nouveau tarif',
      'new_item'           => 'Nouveau tarif',
      'edit_item'          => 'Editer',
      'view_item'          => 'Voir le tarif',
      'all_items'          => 'Voir tous les tarifs',
      'search_items'       => 'Rechercher un tarif',
      'not_found'          => 'Aucun tarif trouvé',
      'not_found_in_trash' => 'Aucun tarif trouvé dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
      'menu_position' => 7,
      'menu_icon' => 'dashicons-store',
      'supports' => [
        'title',
        'editor',
      ],
      
    ];

    register_post_type(
      'price',
      $args
    );
  }

  
  public function activate()
  {
    // A l'activation du plugin, WP, va executer le register_post_type
    $this->registerActivity();
    $this->registerIntro();
    $this->registerPictures();
    $this->registerVideos();
    $this->registerPrice();
    

    // J'execute la fonction native de WP qui permet de recalculer
    // toutes les routes
    // tous les droits
    flush_rewrite_rules();
  }

  public function deactivate()
  {
    // J'execute la fonction native de WP qui permet de recalculer
    // toutes les routes
    // tous les droits
    flush_rewrite_rules();
  }
}

// J'instancie ma classe
$zumbaCPT = new zumbaCPT();

// A l'activation du plugin...
register_activation_hook(__FILE__, [$zumbaCPT, 'activate']);

// A la désactivation du plugin...
register_deactivation_hook(__FILE__, [$zumbaCPT, 'deactivate']);