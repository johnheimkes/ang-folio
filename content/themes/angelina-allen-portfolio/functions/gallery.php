<?php
/**
 * Nerdery Skeleton Theme
 *
 * @package Nerdery_Skeleton_Theme
 * @author John Heimkes IV <john@markupisart.com>
 * @version $Id$
 */
add_action('init', array('PORT_Gallery', 'init'));
/**
 * PORT_Gallery
 *
 * @package PORT_Gallery
 * @author John Heimkes IV <john@markupisart.com>
 */
class PORT_Gallery
{

    /**
     * init method. Hooked to init hook. Remove default gallery styles
     * and shortcode handler.
     *
     * For changing appearance of gallery, modify the gallery.php file in
     * the 'views' folder.
     *
     * @return void
     */
    public static function init()
    {
        // remove default gallery styles
        add_filter('use_default_gallery_style', function(){
            return '';
        });

        // remove the default gallery shortcode handler
        remove_shortcode('gallery', 'gallery_shortcode');

        // add your gallery shortcode handler
        add_shortcode('gallery', array('PORT_Gallery', 'gallery_shortcode'));

    }

    /**
     * Process new Gallery markup
     *
     * @param array $attr
     * @return string
     */
    public static function gallery_shortcode($src, $attr)
    {
        global $post;

        if (is_null($post))
            return '';

        $gallery_attrs   = self::_portfolio_gallery_set_arguments($attr, $post->ID);
        $post_attachment = self::_portfolio_get_post_attachments($gallery_attrs);

        if (empty($post_attachment))
            return '';

        // Should this portion be in a separate template?
        if (is_feed()) {
            $output = "\n";
            foreach ( $post_attachment as $att_id => $attachment )
                $output .= wp_get_attachment_link($att_id, $gallery_attrs->size, true) . "\n";

            return $output;
        }
        
        /**
         * Creates a hook called portfolio-gallery_template, which will permit plugins
         * to add their own templates to the template stack array.
         * Developers should be aware that for their template to override the Skeleton Theme
         * default, it should be the first template in the stack.
         */
        // grab our template
        ob_start();        
        require get_query_template('portfolio-gallery', array('views/gallery.php'));
        $output = ob_get_contents();
        ob_clean();

        return $output;

    }

    /**
     * Set gallery arguments
     *
     * @param array $args Gallery arguments
     * @param integer $post_ID Post ID
     *
     * @return array
     */
    private static function _portfolio_gallery_set_arguments($args, $post_ID)
    {
        /* taken from wp-includes/media.php, ~lines 689-708 */
        if ( isset( $args['orderby'] ) ) {
            $args['orderby'] = sanitize_sql_orderby( $args['orderby'] );
            if ( !$args['orderby'] )
                unset( $args['orderby'] );
        }

        $attrs = (object)shortcode_atts(array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id'         => $post_ID,
            'itemtag'    => 'dl',
            'icontag'    => 'dt',
            'captiontag' => 'dd',
            'columns'    => 3,
            'size'       => 'thumbnail',
            'ids'        => '',
            'include'    => '',
            'exclude'    => ''
        ), $args);

        return $attrs;
    }

    /**
     * Retrieve post attachments
     *
     * @param array $attrs Attributes
     * @return array|false Array of images on success. False if $attrs is empty
     */
    private static function _portfolio_get_post_attachments($attrs)
    {
        /* taken from wp-includes/media.php, ~lines 709-735 */
        if (empty($attrs))
            return false;

        $id = intval($attrs->id);
        if ('RAND' == $attrs->order)
            $orderby = 'none';

        $include = "";

        if (!empty($attrs->ids)) {
            // 'ids' is explicitly ordered
            $orderby = 'post__in';
            $include = $attrs->ids;
        }

        if (!empty($include)) {
            $_attachments = get_posts(array(
                'include'        => $include,
                'post_status'    => 'inherit',
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'order'          => $attrs->order,
                'orderby'        => $attrs->orderby
            ));

            $attachments = array();
            foreach ( $_attachments as $key => $val ) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        } elseif (!empty($attrs->exclude)) {
            $attachments = get_children(array(
                'post_parent'    => $id,
                'exclude'        => $attrs->exclude,
                'post_status'    => 'inherit',
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'order'          => $attrs->order,
                'orderby'        => $attrs->orderby
            ));
        } else {
            $attachments = get_children(array(
                'post_parent'    => $id,
                'post_status'    => 'inherit',
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'order'          => $attrs->order,
                'orderby'        => $attrs->orderby
            ));
        }

        return $attachments;
    }
}
