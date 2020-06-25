<?php

function customize_menu($menu_html, $menu_object)
{
  // Je remplace dans le html du menu la classe "menu-item"
  // par la classe "main-nav__item"
  $menu_html = str_replace('menu-item', $menu_object->menu_class.'--item', $menu_html);
  $menu_html = str_replace('href', 'class="nav__list--link" href', $menu_html);
  $menu_html = str_replace('href', 'class="nav__list--link" href', $menu_html);
  

  return $menu_html;
}

// Là j'indique à WP, que je ne souhaite pas que wp_nav_menu
// affiche aussitot le HTML généré.
// EN effet, WP, va appelé ma fonction "customize_menu" en lui fournissant
// en argument, le HTML.
// Ensuite, le html affiché sera le retour de la fonction "customize_menu"
add_filter('wp_nav_menu', 'customize_menu');