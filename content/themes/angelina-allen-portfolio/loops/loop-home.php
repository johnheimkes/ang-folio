<?php

$work_query = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type'      => 'portfolio_work',
));

if ( $work_query->have_posts() ) : while ( $work_query->have_posts() ) : $work_query->the_post(); ?>

    <div class="work-wrapper">
        <?php the_post_thumbnail( 'work-featured' ); ?>
        <h3 class="hdg-0 mix-hdg-white hdg-center hdg-center-white title-hover">
            <span><?php the_title(); ?></span>
        </h3>
        <div class="bg-transparent"></div>
    </div>

<?php endwhile; endif; ?>
