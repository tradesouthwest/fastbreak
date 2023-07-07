<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
            
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
                itemtype="https://schema.org/Article">
                <div class="inner-content">
                <header>
                <?php 
                    the_title( sprintf( '<h2><span class="post-title"><a href="%s" rel="bookmark">', 
                        esc_attr( esc_url( get_permalink() ) ) 
                        ), 
                        '</a></span></h2>' 
                    ); ?>
                </header>
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
    
            <?php endwhile; ?>
            <?php else : ?>
            
                <div class="post-content">
                
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