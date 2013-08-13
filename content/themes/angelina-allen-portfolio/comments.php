<?php
/**
 * Nerdery Theme
 *
 * @category Nerdery_Skeleton_Theme
 * @package Nerdery_Skeleton_Theme
 * @subpackage Comments
 * @author
 * @version $Id$
 */
?>
            <div>
<?php if ( post_password_required() ) : ?>
                <p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
            </div><!-- #comments -->
<?php
        /* Stop the rest of comments.php from being processed,
         * but don't kill the script entirely -- we still have
         * to fully load the template.
         */
        return;
    endif;
?>

<?php
    // You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
            <h3><?php
            printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'twentyten' ),
            number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
            ?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <div>
                <div><?php previous_comments_link( __( '<span>&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
                <div><?php next_comments_link( __( 'Newer Comments <span>&rarr;</span>', 'twentyten' ) ); ?></div>
            </div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

            <ol>
                <?php
                    wp_list_comments();
// Customize comment output: http://codex.wordpress.org/Function_Reference/wp_list_comments
                ?>
            </ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <div>
                <div><?php previous_comments_link( __( '<span>&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
                <div><?php next_comments_link( __( 'Newer Comments <span>&rarr;</span>', 'twentyten' ) ); ?></div>
            </div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

    /* If there are no comments and comments are closed,
     */
    if ( ! comments_open() ) :
?>
    <p>Comments are closed</p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
