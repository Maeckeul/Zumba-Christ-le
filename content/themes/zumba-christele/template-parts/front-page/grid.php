<section class="grid">
<?php 

$args = [
      'orderby' => 'title',
      'order' => 'ASC',
      'post_type' => 'activity'
    ];

  $wp_query = new WP_Query($args);


  if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>


    <div class="grid__item">
    <img src="<?php the_post_thumbnail_url(); ?>" class="grid__item--picture" alt="pictures">
    <div class="grid__item--description">
      <p class="grid__item--description--title"><?php the_title() ?></p>
      <p class="grid__item--description--content"><?php the_content()?></p>
      <a href="#" class="grid__item--description--button">Cliquez ici pour en savoir plus</a>
    </div>
  </div>


  <?php endwhile; endif; ?>

</section>

<!--
<section class="grid">
<div class="grid--description">
  Christèle, votre coach sportif à Noirmoutier et sur toute la Côte vendéenne.
</div>
<div class="grid__item">
  <img src="https://media.istockphoto.com/photos/young-ballerinas-dancing-doing-practice-in-ballet-studio-picture-id1046156520?b=1&k=6&m=1046156520&s=170667a&w=0&h=SZZgi7KyOVMv2icvlBAk4hHdacgqhSMK105phFy-qFI=" class="grid__item--picture" alt="Gymnastique Rythmique et sportive">
  <div class="grid__item--description">
    <p class="grid__item--description--title">Gymnastique Rythmique et Sportive</p>
    <p class="grid__item--description--content">
      Lorem ipsum dolor, sit amet consectetur adipisicing 
      elit. Assumenda nemo laudantium iusto repellat rem soluta, 
      alias, similique voluptate quisquam velit officia perferendis, 
      ipsam consequuntur consequatur quia! Eligendi culpa magnam modi?
    </p>
    <a href="#" class="grid__item--description--button">Cliquez ici pour en savoir plus</a>
  </div>
</div>
<div class="grid__item">
  <img src="https://media.istockphoto.com/photos/professional-dancer-class-dancing-in-dancing-studio-picture-id1170865144?b=1&k=6&m=1170865144&s=170667a&w=0&h=16nwjZyxptQcmz9JKrzTW9MPQguziirONzGAWfZj93Q=" class="grid__item--picture" alt="Zumba">
  <div class="grid__item--description">
    <p class="grid__item--description--title">Zumba</p>
    <p class="grid__item--description--content">
      Lorem ipsum dolor, sit amet consectetur adipisicing 
      elit. Assumenda nemo laudantium iusto repellat rem soluta, 
      alias, similique voluptate quisquam velit officia perferendis, 
      ipsam consequuntur consequatur quia! Eligendi culpa magnam modi?
    </p>
    <a href="#" class="grid__item--description--button">Cliquez ici pour en savoir plus</a>
  </div>
</div>
<div class="grid__item">
  <img src="https://cdn.pixabay.com/photo/2014/12/20/09/18/running-573762__340.jpg" class="grid__item--picture" alt="Coaching personnel">
  <div class="grid__item--description">
    <p class="grid__item--description--title">Coaching Personnel</p>
    <p class="grid__item--description--content">
      Lorem ipsum dolor, sit amet consectetur adipisicing 
      elit. Assumenda nemo laudantium iusto repellat rem soluta, 
      alias, similique voluptate quisquam velit officia perferendis, 
      ipsam consequuntur consequatur quia! Eligendi culpa magnam modi?
    </p>
    <a href="#" class="grid__item--description--button">Cliquez ici pour en savoir plus</a>
  </div>
</div>
</section>-->