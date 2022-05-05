<?php $wordify_wp_unique_id = wp_unique_id( 'search-form-' );?>
    <form action="<?php echo esc_url(home_url('/'));?>" class="search-form" method="get">
        <div class="form-group">
            <span class="icon fa fa-search"></span>
            <input type="text" name="s" class="form-control" id="<?php echo esc_attr( $wordify_wp_unique_id ); ?>"
                placeholder="<?php esc_attr_e('Type a keyword and hit enter', 'wordify-wp');?>" value="<?php echo get_search_query(); ?>"
                >
        </div>
    </form>
