<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordify_WP
 */

?>


<footer class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 about-us-widget">
                <?php if(is_active_sidebar('footer-1')){
                               dynamic_sidebar('footer-1');
                           }?>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="row">
                    <div class="col-md-7">

                        <?php if(is_active_sidebar('footer-2')){
                      dynamic_sidebar('footer-2');
                           }?>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-4">

                        <div class="mb-5">
                            <?php if(is_active_sidebar('footer-3')){
                      dynamic_sidebar('footer-3');
                           }?>
                        </div>

                        <div class="mb-5">
                            <h3><?php esc_html_e( 'Social', 'wordify-wp' )?></h3>
                            <ul class="list-unstyled footer-social">
                            <?php if(!empty(get_theme_mod('set_twitter' ))) :?>
                                <li><a href="<?php echo esc_url(get_theme_mod('set_twitter'));?>"><span class="fa fa-twitter"></span> Twitter</a></li>
                            <?php endif;?>
                            <?php if(!empty(get_theme_mod('set_facebook' ))) :?>
                                <li><a href="<?php echo esc_url(get_theme_mod('set_facebook'))?>"><span class="fa fa-facebook"></span> Facebook</a></li>
                                <?php endif;?>
                                <?php if(!empty(get_theme_mod('set_instagram' ))) :?>
                                <li><a href="<?php echo esc_url(get_theme_mod('set_instagram'));?>"><span class="fa fa-instagram"></span> Instagram</a></li>
                                <?php endif;?>
                                <?php if(!empty(get_theme_mod('set_youtube' ))) :?>
                                <li><a href="<?php echo esc_url(get_theme_mod('set_youtube'));?>"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="small">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; All Rights Reserved | This HTML template is made with <i
                        class="fa fa-heart text-danger" aria-hidden="true"></i> by <a target="_blank" href="https://colorlib.com"
                        target="_blank">Colorlib</a> Themed By <a target="_blank" href="https://95media.co.uk">95media Themes</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>