<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_date(); ?></div>
        <div class="wysiwyg"><?php the_content(); ?></div>
    </div>

<?php endwhile; endif; ?>
