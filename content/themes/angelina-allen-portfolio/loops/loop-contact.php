<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class( 'page-contact' ); ?>>
        <div class="hdg-flex">
            <div class="hdg-ribbon-left"></div>
            <h2 class="hdg-1 hdg-center hdg-center-salmon mix-hdg-salmon"><?php the_title(); ?></h2>
            <div class="hdg-ribbon-right"></div>
        </div>
        
        <div class="grid-col grid-col-5">
            <?php the_content(); ?>
        </div>
        
        <div class="grid-col-right grid-col-6">
            <ul class="v-list contact-list fleft">
                <li class="v-list-item contact-list-item">
                    <a href="<?php the_field( 'resume_download_link' ); ?>" class="contact-link contact-resume">Resume</a>
                </li>
                
                <li class="v-list-item contact-list-item">
                    <a href="<?php the_field( 'twitter_link' ); ?>" class="contact-link contact-twitter">Twitter</a>
                </li>
                
                <li class="v-list-item contact-list-item">
                    <a href="<?php the_field( 'google_link' ); ?>" class="contact-link contact-google">Google+</a>
                </li>
                
                <li class="v-list-item contact-list-item">
                    <a href="<?php the_field( 'linkedin_link' ); ?>" class="contact-link contact-linkedin">LinkedIn</a>
                </li>
            </ul>
            
            <img src="<?php the_field( 'random_pic' ); ?>" alt="An amazing cat gif." />
        </div>
    </div>

<?php endwhile; endif; ?>
