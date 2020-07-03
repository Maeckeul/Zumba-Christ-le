<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zumba Christèle</title>
  
  <?php wp_head(); ?>

</head>
<body>

  <div class="wrapper">

    <header class="header">

      <div class="header-logo">
        <a href="#" class="header-logo--link">
          <img src="https://cdn.pixabay.com/photo/2018/04/28/15/24/silhouette-3357492_960_720.png" alt="Logo" class="header-logo__img">
          <h1 class="header-logo--brand">Zumba Christèle</h1>
        </a>
      </div>

      <div class="logo-menu">
        <a href="#" class="ui-button open-menu">
          <i class="fas fa-bars"></i>
          <p class="logo-menu__text">Menu</p>
        </a>
      </div>  


      
        <?php

        $menu = wp_nav_menu([
          'theme_location' => 'menu_header',
          'menu_class' => 'nav__list',
          'container' => 'nav',
          'container_class' => 'nav',
          'echo' => false,
          
          
        ]);

        $menu = str_replace('menu-item', 'nav__list--item',$menu);
        $menu = str_replace('href', 'class="nav__list--link" href', $menu);

        echo $menu;
        

      ?>
     
      
    
      <!--<nav class="nav">
        <ul class="nav__list">
          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Accueil</a>
          </li>
          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Planning</a>
          </li>
          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Médias</a>
          </li>
          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Tarifs</a>
          </li>
          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Contacts</a>
          </li>

          <?php 
          $currentUser = wp_get_current_user();

          if(1 == $currentUser->ID):
          ?>

          <li class="nav__list--item" href="#">
            <a href="#" class="nav__list--link">Profil</a>
          </li>

          <?php endif; ?>

        </ul>
        </nav>-->
      

      <?php 
      $currentUser = wp_get_current_user();

      if(0 == $currentUser->ID):
      ?>

      <div class="login-button">
        <a href="#" class="login-button--link">Se connecter</a>
      </div>

      <?php else: ?>

      <div class="logout-button">
        <a href="http://localhost/Apotheose/projet-zumba-christele/wp/wp-login.php?action=logout&_wpnonce=088f55f4aa" class="logout-button--link" style="background-color: red;">Se déconnecter</a>
      </div>

      <?php endif; ?>

    </header>

    <main class="main">