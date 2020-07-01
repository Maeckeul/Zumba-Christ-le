<div class="menu">
    
    <a href="" class="ui-button close-menu">
      <i class="fas fa-times"></i>
      <p class="logo--description">Fermer</p>
    </a>

    <?php


      $menu_burger = wp_nav_menu([
        'theme_location' => 'menu_header',
        'menu_class' => 'main-nav__list',
        'container' => 'nav',
        'container_class' => 'main-nav' ,
        'echo' => false,
             
      ]);

    $menu_burger = str_replace('menu-item', 'main-nav__list--item',$menu_burger);
    $menu_burger = str_replace('href', 'main-nav__list--item--link" href', $menu_burger);

    echo $menu_burger;




      ?>

    <!--<nav class="main-nav">
      <ul class="main-nav__list">
        <li class="main-nav__list--item">
          <a href="" class="main-nav__list--item--link">Accueil</a>
        </li>
        <li class="main-nav__list--item">
          <a href="" class="main-nav__list--item--link">Planning</a>
        </li>
        <li class="main-nav__list--item">
          <a href="" class="main-nav__list--item--link">Médias</a>
        </li>
        <li class="main-nav__list--item">
          <a href="" class="main-nav__list--item--link">Tarifs</a>
        </li>
        <li class="main-nav__list--item">
          <a href="" class="main-nav__list--item--link">Contacts</a>
        </li>
        
      </ul>
    </nav>-->

  </div>