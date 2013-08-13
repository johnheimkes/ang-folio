<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class(); ?>>
        <h2><?php the_title(); ?></h2>
        <div><?php the_date(); ?></div>
        <div class="wysiwyg"><?php the_content(); ?></div>
        <div><?php _e('This entry was posted in ').the_category(', '). _e(' by ').the_author_link(); ?></div>
        <div><?php comments_template(); ?></div>
    </div>

<?php endwhile; endif; ?>
