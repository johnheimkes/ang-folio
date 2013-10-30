<?php

$posts = get_field( 'work_sorter' );

if ( $posts ) : foreach ( $posts as $post ) : setup_postdata($post);
?>

    <div class="work-wrapper">
        <a class="work-wrapper-link" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'work-featured' ); ?>
            <h3 class="hdg-0 mix-hdg-white hdg-center hdg-center-white title-hover">
                <span><?php the_title(); ?></span>
            </h3>
            <div class="bg-transparent"></div>
        </a>
    </div>

<?php endforeach; endif; ?>
