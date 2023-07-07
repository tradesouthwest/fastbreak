<footer id="site-footer" class="container"> 
    <div id="footerWidgets" class="row">
        <div class="col is-horizontal-align">
            <div class="footer-block">
                <?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
                <div id="footer_one" class="sidebar widget-area" role="complementary">
                        
                    <?php dynamic_sidebar( 'footer-one' ); ?>
                    
                </div>
                <?php endif; ?>
            </div>
        </div>
            <div class="col is-horizontal-align">
                <div class="footer-block">
                    <?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
                        <div id="footer_two" class="sidebar widget-area" role="complementary">
                            
                            <?php dynamic_sidebar( 'footer-two' ); ?>
                        
                        </div>
                    <?php endif; ?>
                </div>
            </div>
                <div class="col is-horizontal-align"> 
                    <div class="footer-block">
            
                        <?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
                        <div id="footer_three" class="sidebar widget-area" role="complementary">
                            
                            <?php dynamic_sidebar( 'footer-three' ); ?>
                        
                        </div>
                        <?php endif; ?>
                    </div>
                </div>     
    </div>
        <div id="footerCopy" class="row">
            <div class="col"> 
                <p>&copy; <?php echo esc_html( date_i18n(__( 'Y', 'fastbreak' ) ) ); ?> 
                <a class="bg-light" href="#top" rel="nofollow">[<?php esc_html_e('Top', 'fastbreak'); ?>]</a></p>
            </div>
        </div>
        
</footer>
    <?php wp_footer(); ?>

</body>
</html>