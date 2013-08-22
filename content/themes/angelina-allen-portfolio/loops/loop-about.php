<?php

$profile_pic_id = get_field( 'pic_profile' );
$secondary_pic_id = get_field( 'pic_secondary' );

$size = "profile_pic";

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class( 'page-about' ); ?>>
        <div class="grid-row">
            <div class="hdg-flex">
                <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon page-title">
                    <span class="mix-hdg-border-salmon"><?php the_title(); ?></span>
                </h2>
            </div>

            <div class="profile-pic">
                <img class="fleft" src="<?php the_field( 'pic_profile' ); ?>" alt="" />
                <img class="fright" src="<?php the_field( 'pic_secondary' ); ?>" alt="" />
            </div>

            <div class="grid-col grid-col-middle grid-col-10 about-statement">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="hdg-flex">
            <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon page-title">
                <span class="mix-hdg-border-salmon">Resume</span>
            </h2>
        </div>

        <div class="grid-col grid-col-middle grid-col-10 mix-hdg-gra resume-wrapper">
            <h3 class="hdg-2 mix-hdg-salmon mix-hdg-border-salmon hdg-italic hdg-inline">Work Experience :</h3>

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
