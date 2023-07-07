<header role="banner">
    <div class="row">
        <div class="col is-left"> 
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div> 

        <div class="col is-center vpad-md">
        <?php 
                if( has_custom_logo() ) : ?>
                <div class="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php 
                    echo wp_kses_post( force_balance_tags( 
                        tinydancer_theme_custom_logo() ) ); ?>
                    </a>
                </div>
                <?php endif; ?>
        </div>
        
        <div class="col is-right">
            <div class="site-description">
                <?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?>
            </div>
        </div>
    </div>

</header>
    <nav class="nav" role="navigation">
    <div class="masthead active-element">
                    <h1><a href="#0">Branding</a></h1>
                    <div id="menu-toggle" class="menu-toggle active-element">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>
                </div>
                <div class="main-nav-list active-element">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'primary-menu',
                    )
                );
                ?>
                </div>
    </nav>