<?php
/**
 * @package Juliette WP
 */

add_action('widgets_init', 'wordify_author_register');

function wordify_author_register() {
    register_widget('Wordify_Author_Widget');
}

class Wordify_Author_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Wordify_Author_Widget', esc_html__(' Wordify WP Author', 'wordify-wp'), array(
                'description' => esc_html__('Show Author Profile', 'wordify-wp')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $fields = array(
            'wordify_wp_author_name' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_name',
                'wordify_wp_widgets_title' => esc_html__('Author Name', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'text',
            ),
            'wordify_wp_author_desc' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_desc',
                'wordify_wp_widgets_title' => esc_html__('Author Description', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'textarea',
            ),
            'wordify_wp_author_image' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_image',
                'wordify_wp_widgets_title' => esc_html__('Author Image', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'upload',
            ),
            'wordify_wp_author_facebook' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_facebook',
                'wordify_wp_widgets_title' => esc_html__('Facebook Link', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'text',
            ),
            'wordify_wp_author_twitter' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_twitter',
                'wordify_wp_widgets_title' => esc_html__('Twitter Link', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'text',
            ),
            'wordify_wp_author_youtube' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_youtube',
                'wordify_wp_widgets_title' => esc_html__('Youtube Link', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'text',
            ),
            'wordify_wp_author_instagram' => array(
                'wordify_wp_widgets_name' => 'wordify_wp_author_instagram',
                'wordify_wp_widgets_title' => esc_html__('Instagram Link', 'wordify-wp'),
                'wordify_wp_widgets_field_type' => 'text',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        
        $wordify_wp_author_name = apply_filters( 'widget_title', empty( $instance['wordify_wp_author_name'] ) ? '' : $instance['wordify_wp_author_name'], $instance, $this->id_base );       
        $wordify_wp_author_desc = isset( $instance['wordify_wp_author_desc'] ) ? $instance['wordify_wp_author_desc'] : '' ;
        $wordify_wp_author_image = isset( $instance['wordify_wp_author_image'] ) ? $instance['wordify_wp_author_image'] : '' ;
        $wordify_wp_author_facebook = isset( $instance['wordify_wp_author_facebook'] ) ? $instance['wordify_wp_author_facebook'] : '' ;
        $wordify_wp_author_twitter = isset( $instance['wordify_wp_author_twitter'] ) ? $instance['wordify_wp_author_twitter'] : '' ;
        $wordify_wp_author_youtube = isset( $instance['wordify_wp_author_youtube'] ) ? $instance['wordify_wp_author_youtube'] : '' ;
        $wordify_wp_author_instagram = isset( $instance['wordify_wp_author_facebook'] ) ? $instance['wordify_wp_author_instagram'] : '' ;
        
        echo $before_widget;
        ?>

        <!-- replace the code below to match your widget author layout for your theme -->

            <div class="sidebar-box">
              <div class="bio text-center">
              <?php if($wordify_wp_author_name){ ?>
                 <img src="<?php echo esc_url( $wordify_wp_author_image ); ?>" alt="<?php echo esc_html($wordify_wp_author_name); ?>" class="img-fluid">
              <?php }?>
                <div class="bio-body">
                <?php if($wordify_wp_author_name){ ?><h2><?php echo esc_html($wordify_wp_author_name); ?></h2><?php }?>
                <?php if($wordify_wp_author_desc){ ?>
                  <p><?php echo esc_html($wordify_wp_author_desc); ?></p>
                <?php }?>
                  <p class="social">
                  <?php if( $wordify_wp_author_facebook ){ ?>
                    <a href="<?php echo esc_url( $wordify_wp_author_facebook ); ?>" target="_blank" class="p-2"><span class="fa fa-facebook"></span></a>
                 <?php } ?>

                 <?php if( $wordify_wp_author_twitter ){ ?>
                    <a href="<?php echo esc_url( $wordify_wp_author_twitter ); ?>" target="_blank" class="p-2"><span class="fa fa-twitter"></span></a>
                 <?php }?>

                 <?php if( $wordify_wp_author_instagram ){ ?>
                    <a href="<?php echo esc_url( $wordify_wp_author_instagram ); ?>" target="_blank" class="p-2"><span class="fa fa-instagram"></span></a>
                    <?php }?>
                    <?php if( $wordify_wp_author_youtube ){ ?>
                    <a href="<?php echo esc_url( $wordify_wp_author_youtube ); ?>" target="_blank" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    <?php }?>
                  </p>
                </div>
              </div>
            </div>

         


        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    wordify_wp_widgets_updated_field_value()        defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$wordify_wp_widgets_name] = wordify_wp_widgets_updated_field_value($widget_field, $new_instance[$wordify_wp_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    wordify_wp_widgets_show_widget_field()  defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $wordify_wp_widgets_field_value = !empty($instance[$wordify_wp_widgets_name]) ? esc_attr($instance[$wordify_wp_widgets_name]) : '';
            wordify_wp_widgets_show_widget_field($this, $widget_field, $wordify_wp_widgets_field_value);
        }
    }

}

