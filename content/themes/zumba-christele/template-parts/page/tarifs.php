<section class="intro">

        <div class="intro--presentation">
          Tarifs
        </div>
      </section>

      <?php 

        $args =[
          'orderby' => 'title',
          'order' => 'DSC',
          'post_type' => 'price',
        ];

        $wp_query = new WP_Query($args); ?>

      <section class="tarifs">
        
        <?php if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>

        <div class="tarifs__item">
            <div class="tarifs__item--title"><?php the_title(); ?></div>
            <div class="tarifs__item--price"><?php the_content(); ?></div>
        </div>

        <?php endwhile; endif; ?>


        <!--<div class="tarifs__item">
            <p class="tarifs__item--title">Séance coaching individuel</p>
            <p class="tarifs__item--price">40 €</p>
            <p class="tarifs__item--description">La séance</p>
        </div>
        <div class="tarifs__item">
            <p class="tarifs__item--title">Séance coaching duo</p>
            <p class="tarifs__item--price">55 €</p>
            <p class="tarifs__item--description">La séance</p>
        </div>
        <div class="tarifs__item">
            <p class="tarifs__item--title">Forfait 10 séances</p>
            <p class="tarifs__item--price">350 €</p>
        </div>
        <div class="tarifs__item">
            <p class="tarifs__item--title">Coaching groupes / entreprises</p>
            <p class="tarifs__item--devis">sur devis</p>
        </div>-->

      </section>

      <section class="tarifs__description">
        <p class="tarifs__description--content">

            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nam laboriosam nihil corrupti! Voluptates, repellendus?
        </p>
        <p class="tarifs__description--content">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum cupiditate deleniti, deserunt corrupti voluptas ex officia ipsa similique ut!
        </p>
      </section>