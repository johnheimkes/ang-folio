<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class(); ?>>
        <div class="hdg-flex">
            <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon page-title">
                <span class="mix-hdg-border-salmon"><?php the_title(); ?></span>
            </h2>
        </div>
        
        <div class="grid-col">
            <?php the_post_thumbnail( 'work-featured' ); ?>
        </div>
        
        <div class="grid-col grid-col-12 work-detail">
            <div class="grid-col grid-col-2">
                <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic">Client :</h3>
                <p><?php the_field( 'client' ); ?></p>
            </div>
            
            <div class="grid-col grid-col-2">&nbsp;</div>

            <div class="grid-col grid-col-2">
                <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic">Service :</h3>
                <p><?php the_field( 'service' ); ?></p>
            </div>
            
            <div class="grid-col grid-col-2">&nbsp;</div>
            
            <div class="grid-col grid-col-2">
                <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic">Link :</h3>
                <a href="<?php the_permalink(); ?>"><?php the_field( 'link' ); ?></a>
            </div>
            
            <div class="project-details cboth">
                <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic hdg-inline">Project Details :</h3>
                <p><?php the_field( 'project_details' ); ?></p>
            </div>
        </div>
        
        <div class="wysiwyg"><?php the_content(); ?></div>
    </div>

<?php endwhile; endif; ?>
