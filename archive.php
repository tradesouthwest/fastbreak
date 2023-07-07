<?php
/**
 * The archive rendering file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
        <div class="col col-12-sm col-12-md col-9-lg">
        <span><em><?php esc_html_e('Categorized as: ', 'fastbreak'); ?></em></span> 
        <h2><?php the_category( ' &bull; ' ); ?></h2>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
              itemtype="https://schema.org/Article">
            <div class="row excerpt-wrapper">
                <div class="col-3 excerpt-attachment">
                    <?php do_action( 'fastbreak_render_attachment' ); ?>
                </div>
                    <div class="col-8 inner-content">
                        <header>
                        <?php 
                            the_title( sprintf( '<h2><span class="post-title"><a href="%s" rel="bookmark">', 
                                esc_attr( esc_url( get_permalink() ) ) 
                                ), 
                                '</a></span></h2>' 
                            ); ?>
                        </header>

                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                    </div>
                </div>
            </article>

            <?php endwhile; ?>
            <?php else : ?>
              
                <div class="post-content">
                    <span><em><?php esc_html_e('Can not find content for: ', 'fastbreak'); ?></em></span> 
                    <h2><?php the_category( ' &bull; ' ); ?></h2>
                    <p><?php echo esc_url( home_url('/') ); ?><?php esc_html_e('Can not find content. ', 'fastbreak'); ?></p>
                
                </div>

	        <?php endif; ?>

        </div>
      
        <div class="col col-12-sm col-12-md col-3-lg">
            <?php if ( is_active_sidebar( 'sidebar-last' ) ) : ?>
            <div id="sidebar-last" class="sidebar widget-area" role="complementary">
                       
                <?php dynamic_sidebar( 'sidebar-last' ); ?>
                    
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>