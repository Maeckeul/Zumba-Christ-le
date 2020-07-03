<?php

get_header();

if (have_posts()): while(have_posts()): the_post();

?>

<div class="intro--presentation"><?php the_title(); ?></div>

<section><?php the_content(); ?></section>

<?php endwhile; endif;

get_footer();
