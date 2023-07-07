<?php
/**
 * Template Name: Three Section Page
 *
 * It is used to display coontent on left and two sidebars to right. Best for mobile.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
        <div class="col col-7">

            <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
            itemtype="https://schema.org/Article">

            <div class="content-wrapper">
                <div class="inner-content">
                    <header>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </header>
                        <div class="page-content-three">
                    
                            <?php do_action( 'fastbreak_render_attachment' ); ?>            
                            <?php the_content(); ?>

                        </div>
                </div>
            </div>

            </article>

            <?php endwhile; ?>

            <div class="col col-12">
                <nav class="pagination-nav">
                    <div class="col-3-sm">
                        <div class="nav-previous alignleft">

                            <?php previous_posts_link( '<span class="prvpst-nav"> < </span>' ); ?>

                        </div>
                    </div>
                    <div class="col col-6-sm ">
                        <span class="algn-cntr">

                            <?php do_action( 'fastbreak_check_pagination' ); ?>

                        </span>
                    </div>
                        <div class="col-3-sm">
                            <div class="nav-next alignright">

                                <?php next_posts_link( '<span class="nxtpst-nav"> > </span>' ); ?>

                            </div>
                        </div>
                </nav>
            </div>

        </div>
            <div class="col col-2">

                <?php if ( is_active_sidebar( 'sidebar-first' ) ) : ?>

                <div id="sidebar-first" class="sidebar widget-area" role="complementary">

                    <?php dynamic_sidebar( 'sidebar-first' ); ?>

                </div>

                <?php endif; ?>

            </div>

        <div class="col col-3">

            <?php if ( is_active_sidebar( 'sidebar-last' ) ) : ?>

            <div id="sidebar-last" class="sidebar widget-area" role="complementary">
                       
                <?php dynamic_sidebar( 'sidebar-last' ); ?>
                    
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>