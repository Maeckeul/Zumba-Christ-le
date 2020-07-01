<section class="intro">

  <div class="intro--presentation">
    Médias
  </div>

  

  <div class="intro__bio">

    <?php if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
            
    <div class="intro--content">
      <?php the_content()?>
    </div>

    <?php endwhile; endif; ?>
  </div>

  

</section>

<section class="media-grid">

  <div class="grid--description">
    Photos
  </div>

  <?php
    $args = [
      'orderby' => 'title',
      'order' => 'ASC',
      'post_type' => 'photos'
    ];

    $wp_query = new WP_Query($args);

  ?>

  <div class="media-grid__item">
    <?php if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
    <img src="<?php the_post_thumbnail_url(); ?>" class="media-grid__item--picture" alt="image">
    <?php endwhile; endif; ?>
  </div>
        
</section>

<section class="media-grid">

  <div class="grid--description">
    Vidéos
  </div>

  <?php
    $args = [
      'orderby' => 'title',
      'order' => 'ASC',
      'post_type' => 'videos'
    ];

    $wp_query = new WP_Query($args);
  ?>

  <div class="media-grid__item">
  <?php if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
    <?php the_content()?>

    <?php endwhile; endif; ?>
  </div>
  





<!--<div class="media-grid__item">
  <iframe class="media-grid__item--video" src="https://www.youtube.com/embed/1N-n1KEivbo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <iframe class="media-grid__item--video" src="https://www.youtube.com/embed/8DZktowZo_k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <iframe class="media-grid__item--video" src="https://www.youtube.com/embed/kC7ILO-gujU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <iframe class="media-grid__item--video" src="https://www.youtube.com/embed/8HpG0l9cLos" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   
</div>-->



        
</section>