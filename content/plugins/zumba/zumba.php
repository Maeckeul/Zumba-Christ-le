<?php

/*
Plugin Name: Zumba CPT
Description: Mise en place des CPT pour le thème Zumba
Author: Davy
Version: 0.1
*/

// Sécuriser le plugin
if (!defined('WPINC')) {die();}

class zumba
{
  public function __construct()
  {
    add_action('init', [$this, 'registerActivity']);
    add_action('init', [$this, 'registerIntro']);
    
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
      'menu_position' => 5,
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
      'menu_position' => 5,
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

  
  public function activate()
  {
    // A l'activation du plugin, WP, va executer le register_post_type
    $this->registerActivity();
    $this->registerIntro();
    

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
$zumba = new zumba();

// A l'activation du plugin...
register_activation_hook(__FILE__, [$zumba, 'activate']);

// A la désactivation du plugin...
register_deactivation_hook(__FILE__, [$zumba, 'deactivate']);