<?php
/**
 * Define fields for Widgets.
 * 
 * @package Wordify WP
 */

function wordify_wp_widgets_show_widget_field( $instance = '', $widget_field = '', $wordify_wp_field_value = '' ) {
    
	extract( $widget_field );
	
	switch( $wordify_wp_widgets_field_type ) {
	
		// Standard text field
		case 'text' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $wordify_wp_widgets_name )); ?>"><?php echo esc_html($wordify_wp_widgets_title); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($instance->get_field_id( $wordify_wp_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $wordify_wp_widgets_name )); ?>" type="text" value="<?php echo esc_attr($wordify_wp_field_value); ?>" />
				
				<?php if( isset( $wordify_wp_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($wordify_wp_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;

		// Textarea field
		case 'textarea' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $wordify_wp_widgets_name )); ?>"><?php echo esc_html($wordify_wp_widgets_title); ?>:</label>
				<textarea class="widefat" rows="6" id="<?php echo esc_attr($instance->get_field_id( $wordify_wp_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $wordify_wp_widgets_name )); ?>"><?php echo esc_html($wordify_wp_field_value); ?></textarea>
			</p>
			<?php
			break;
                       

		case 'upload' :

            $output = '';
            $id = esc_attr($instance->get_field_id($wordify_wp_widgets_name));
            $class = '';
            $int = '';
            $value = esc_html($wordify_wp_field_value);
            $name = esc_attr($instance->get_field_name($wordify_wp_widgets_name));


            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div style="padding: 20px 5px; border: solid 1px #dcdcdc; margin-top:10px;" class="sub-option widget-upload">';
            $output .= '<label for="' . esc_attr($instance->get_field_id($wordify_wp_widgets_name)) . '">' . esc_attr($wordify_wp_widgets_title) . '</label><br/>';
            if( isset( $wordify_wp_widgets_description ) ) {
				$output .= '<br />';
				$output .=  '<small>'. esc_html($wordify_wp_widgets_description).'</small>';
            }
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_html__('No file chosen', 'wordify-wp') . '" />' . "\n";
            if (function_exists('wp_enqueue_media')) {
                
				$output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . esc_html__('Upload', 'wordify-wp') . '" />' . "\n";

            } else {
                $output .= '<p><i>' . esc_html__('Upgrade your version of WordPress for full media support.', 'wordify-wp') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";

            if ($value != '') {
                $remove = '<a class="remove-image remove-screenshot">'.esc_html__('Does not look right? Remove ','wordify-wp').'</a>';
                $attachment_id = attachment_url_to_postid($value);

                $image_array = wp_get_attachment_image_src($attachment_id, 'medium');
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ( isset( $image_array[0] ) && $image_array[0] ) {
                    $output .= '<img src="' . esc_url($image_array[0]) . '" alt="" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = esc_html__('View File', 'wordify-wp');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output;
            break;
        
	}
	
}

function wordify_wp_widgets_updated_field_value( $widget_field, $new_field_value ) {
    
	extract( $widget_field );
	 
    if ($wordify_wp_widgets_field_type == 'text') {
         return sanitize_text_field($new_field_value);
    } 
    elseif( $wordify_wp_widgets_field_type == 'textarea' ) {

		return sanitize_textarea_field( $new_field_value );	
	}
    else {
		return strip_tags( $new_field_value );
	}

}