<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="box">
        <?php the_post_thumbnail( 'work-featured' ); ?>
        <h3 class="hdg-1 mix-hdg-white hdg-center hdg-center-white title-hover"><?php the_title(); ?></h3>
    </div>

<?php endwhile; endif; ?>
