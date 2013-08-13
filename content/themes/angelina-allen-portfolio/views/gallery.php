<?php
/**
 * WordPress Sandbox
 *
 * @package WordPress_Sandbox
 * @subpackage Gallery
 * @author John Heimkes IV <john@markupisart.com>
 * @version $Id$
 */
$size_class = sanitize_html_class($gallery_attrs->size);
?>
<!-- Nerdery Skeleton Theme's new Gallery markup-->
<div id="gallery-<?php echo esc_attr($post->ID); ?>" class="gallery">
    <ul class="gallery-list gallery-size-<?php echo $size_class; ?> gallery-columns-<?php echo $gallery_attrs->columns; ?>">
    <?php foreach ($post_attachment as $attachment) :
        $post_excerpt = wptexturize($attachment->post_excerpt);
        list($src,,) = wp_get_attachment_image_src($attachment->ID, 'full');

        ?>
        <li class="gallery-item">
            <div class="gallery-icon">
                <a href="<?php echo esc_url($src); ?>" class="attachment-link"><?php echo wp_get_attachment_image($attachment->ID, $gallery_attrs->size); ?></a>
            </div>

            <?php if ($post_excerpt) :  ?>
            <p class="gallery-caption">
                <?php echo $post_excerpt; ?>
            </p>
            <?php endif; ?>

        </li>
    <?php endforeach; ?>
    </ul>
</div>
