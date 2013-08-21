<?php

$profile_pic_id = get_field( 'pic_profile' );
$secondary_pic_id = get_field( 'pic_secondary' );

$size = "profile_pic";

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class( 'page-about' ); ?>>
        <div class="hdg-flex">
            <div class="hdg-ribbon-left"></div>
            <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon page-title"><?php the_title(); ?></h2>
            <div class="hdg-ribbon-right"></div>
        </div>
        
        <div class="grid-col">
            <img src="<?php the_field( 'pic_profile' ); ?>" alt="" />
            <img src="<?php the_field( 'pic_secondary' ); ?>" alt="" />
        </div>
        
        <div class="grid-col grid-col-middle grid-col-10">
            <?php the_content(); ?>
        </div>
        
        <div class="hdg-flex">
            <div class="hdg-ribbon-left"></div>
            <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon page-title">Resume</h2>
            <div class="hdg-ribbon-right"></div>
        </div>
        
        <div class="grid-col grid-col-middle grid-col-10 mix-hdg-gray">
            <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic">Work Experience :</h3>
            
            <?php if ( get_field( 'resume' ) ) : while ( has_sub_field( 'resume' ) ) : ?>
                <div class="experience">
                    <h4 class="hdg-2 experience-title"><?php the_sub_field( 'job_title_company' ); ?></h4>
                    <h5 class="hdg-3 experience-date"><?php the_sub_field( 'date_worked' ); ?></h5>
                    <?php the_sub_field( 'job_description' ); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>

<?php endwhile; endif; ?>
