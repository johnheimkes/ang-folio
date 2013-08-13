<form method="get" action="<?php echo home_url( '/' ); ?>" role="search">
        <input type="text" value="<?php esc_attr(get_query_var('s')); ?>" placeholder="Search" name="s" />
        <input type="submit" value="Go" />
</form>