<?php 

get_header();

?>


        <?php 
        //The Loop
        //https://developer.wordpress.org/themes/basics/the-loop/
        //si on a quelque chose à afficher.... 
        if ( have_posts() ) : 
            //prépare l'affichage du post
            the_post(); 
              
            //$post est un nom de variable réservé par wordpress attention !
        ?>
        
        <h2 class=""><?php the_title() ?></h2>


        <div class="">
          
            <div><?php the_content() ?></div>
          
        <?php
        endif; 
        ?>
        </div>


        <?php comment_form(); // Par ici les commentaires ?>

<?php get_footer(); ?>



