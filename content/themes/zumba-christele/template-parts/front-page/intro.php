<section class="intro">

  <?php

    $args = [
    'orderby' => 'title',
    'order' => 'ASC',
    'post_type' => 'introduction',
    'posts_per_page' => 1,
    ];

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>

      
      <div class="intro--presentation">
        <?php the_title(); ?>
      </div>

      <div class="intro__bio">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="girl" class="intro__bio--picture">
        <div class="intro--content"><?php the_content(); ?></div>
    
      </div>

      <?php endwhile; endif; ?>

</section>