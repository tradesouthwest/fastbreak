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

            <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
                itemtype="https://schema.org/Article">

                <?php do_action( 'fastbreak_render_attachment' ); ?>

                <div class="inner-content">
                <header>
               <h2 class="post-title"><?php the_title(); ?></h2>
                </header>
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>

                    <?php do_action( 'fastbreak_single_meta_footer' ); ?>

                </div>
            </article>
                <aside class="comments-aside">
                
                    <?php comments_template(); ?>
                    
                </aside>
    
            <?php endwhile; ?>
            

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
