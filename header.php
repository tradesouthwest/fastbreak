<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package fastbreak
 * @since   1.0
 */

?><!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?><a class="skip-link screen-reader-text" href="#sitecontent">
<?php esc_html_e( 'Skip to content', 'fastbreak' ); ?></a>

<section id="top" class="container">
	<header class="top-navbanner"> 
		
	    <?php if ( has_nav_menu( 'secondary-menu' ) ) : ?>
	    
		<div class="row">		<!-- above top strip -->
			<div class="col-12 text-white top-strip"> 
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary-menu',
						'menu_class' => 'page-nav-top',
					)
				);
			?>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">		<!-- above menu strip -->
			<div class="col-12 text-white top-strip"> 

				<?php do_action( 'fastbreak_render_topstrip' ); ?>
			
			</div>
		</div>
			<div class="row above-menu">		
		    <!-- above menu banner -->
				<div class="col col-6-lg col-12-md">
					<div class="card is-center">
					
						<?php if( has_custom_logo() ) : ?>
                	
						<div class="site-logo">
                    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="bookmark">
							<?php 
							echo wp_kses_post( force_balance_tags( fastbreak_theme_custom_logo() ) ); 
							?></a>
                		</div>

                		<?php endif; ?>

						<div class="page-header-inner">
                			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                			<div class="site-description">
								<?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?>
							</div>
            			</div>
					</div>
				</div>

				<div class="col col-6-lg col-12-md">
					<div class="card is-center">
				
						<?php do_action('fastbreak_render_advert'); ?>
				
					</div>
				</div>
			</div>
				
				<div class="row">
				<!-- menu -->
					<div class="col-12"> 
					<button id="openMobi" class="navbar-toggle button outline" 
						onclick = "handleClick()">|||</button>
						<nav class="nav">
					
							<div id="togmenu" class="nav-list" style=" ">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary-menu',
									'menu_class' => 'page-nav',
									'walker' => new Fastbreak_Wrap(),
								)
							);
							?>
							</div>
						</nav>
					</div>
				</div>

	</header>
</section><!-- ends top -->
