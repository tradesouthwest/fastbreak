<?php
/**
 * Template Name: Full Width Page
 *
 * This template file has not sidebar and will show the full width of the page with content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
        <div class="col col-12">

        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
          itemtype="https://schema.org/Article">

          <div class="content-wrapper full-width-content">
                <div class="inner-content">
                    <header>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </header>
                    <div class="page-content-full">
                    
                        <?php do_action( 'fastbreak_render_attachment' ); ?>            
                        <?php the_content(); ?>

                    </div>
                </div>
            </div>

        </article>
    
        <?php endwhile; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>