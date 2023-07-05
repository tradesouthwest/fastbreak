<footer id="site-footer" class="container"> 
    <div id="footerWidgets" class="row">
        <div class="col is-horizontal-align">
            <div class="footer-block">
                <?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
                <div id="footer_one" class="sidebar widget-area" role="complementary">
                        
                    <?php dynamic_sidebar( 'footer-one' ); ?>
                    
                </div>
                <?php else: ?>
                    <!--<div id="fs-upcoming"></div> <script> (function (w,d,s,o,f,js,fjs) { w['fsUpcomingEmbed']=o;w[o] = w[o] || function () { (w[o].q = w[o].q || []).push(arguments) }; js = d.createElement(s), fjs = d.getElementsByTagName(s)[0]; js.id = o; js.src = f; js.async = 1; fjs.parentNode.insertBefore(js, fjs); }(window, document, 'script', 'fsUpcoming', 'https://cdn.footystats.org/embeds/upcoming.js')); fsUpcoming('params', { teamID: 7988 }); </script> -->
                <?php endif; ?>
            </div>
        </div>
            <div class="col is-horizontal-align">
                <div class="footer-block">
                    <?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
                        <div id="footer_two" class="sidebar widget-area" role="complementary">
                            
                            <?php dynamic_sidebar( 'footer-two' ); ?>
                        
                        </div>
                    <?php else: ?>
                        <!--<div id="ww_ac6b55406aff6" v='1.3' loc='id' a='{"t":"horizontal","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"fahrenheit","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather Data Source: <a href="https://oneweather.org/fr/paris/25_days/" id="ww_ac6b55406aff6_u" target="_blank">Meteo 25 jours</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_ac6b55406aff6"></script>-->
                    <?php endif; ?>
                </div>
            </div>
                <div class="col is-horizontal-align"> 
                    <div class="footer-block">
            
                        <?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
                        <div id="footer_three" class="sidebar widget-area" role="complementary">
                            
                            <?php dynamic_sidebar( 'footer-three' ); ?>
                        
                        </div>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </div>
                </div>     
    </div>
        <div id="footerCopy" class="row">
            <div class="col bd-light"> 
                <p>&copy; 2023 <a href="#topHeader">[Top]</a></p>
            </div>
        </div>
        
</footer>
    <?php wp_footer(); ?>

</body>
</html>