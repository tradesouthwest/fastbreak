<?php
/**
 * The front page template file
 *
 * File used to display the front-page when blog is not the home page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
        <div class="col col-12-sm col-2-md">

            <?php if ( is_active_sidebar( 'sidebar-first' ) ) : ?>
            
            <div id="sidebar-first" class="sidebar widget-area" role="complementary">
            
                <?php dynamic_sidebar( 'sidebar-first' ); ?>
            
            </div>
            
            <?php endif; ?>
        
        </div>
            <div class="col col-9 col-7-md">
                
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
                    itemtype="https://schema.org/Article">

                    <header class="page-title">
                    <?php 
                        the_title( sprintf( '<h3><span class="post-title"><a href="%s" rel="bookmark">', 
                            esc_attr( esc_url( get_permalink() ) ) 
                            ), 
                        '</a></span></h3>' 
                        ); ?>
                    </header>
              
                    <div class="inner-content">
              
                        <?php the_content(); ?>
                  
                    </div>

                </article>
    
            <?php endwhile; ?>
            
            </div>
                <div class="col col-3 col-3-md">
                    <?php if ( is_active_sidebar( 'sidebar-last' ) ) : ?>
                    <div id="sidebar-last" class="sidebar widget-area" role="complementary">
                        
                        <?php dynamic_sidebar( 'sidebar-last' ); ?>
                    
                    </div>
                    <?php endif; ?>
                </div>
    </section>
</main>

<?php get_footer(); ?>